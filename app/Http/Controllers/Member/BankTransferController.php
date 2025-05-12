<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\StoreBankTransferRequest; // Import the new Request class
use App\Models\BankTransferRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Assuming you have a Setting model or similar

class BankTransferController extends Controller
{
    /**
     * Display the bank transfer request form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $user = Auth::user();
        // Access coin_wallet_balance from the related Member model
        $hraBalance = $user->member->coin_wallet_balance ?? 0;

        return view('member.bank-transfer.create', compact('hraBalance'));
    }

    /**
     * Store a new bank transfer request.
     *
     * @param  \App\Http\Requests\Member\StoreBankTransferRequest  $request  // Use the new Request class
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBankTransferRequest $request) // Type-hint the new Request class
    {
        $user = Auth::user();
        $requestedAmountHra = $request->input('amount_hra');

        // Fetch the current HRA to Euro exchange rate from settings
        // Assuming the rate is stored in a setting with the key 'hra_to_euro_rate'
        // You might need to adjust how you fetch settings based on your application
        $exchangeRate = Setting::where('key', 'hra_to_euro_rate')->value('value') ?? 0; // Default to 0 if not found

        // Calculate the equivalent fiat amount
        $calculatedFiatAmount = $requestedAmountHra * $exchangeRate;

        try {
            DB::beginTransaction();

            BankTransferRequest::create([
                'user_id' => $user->id,
                'bank_name' => $request->input('bank_name'),
                'account_name' => $request->input('account_name'),
                'iban' => $request->input('iban'),
                'swift_code' => $request->input('swift_code'),
                'amount_hra' => $requestedAmountHra,
                'amount_fiat' => $calculatedFiatAmount, // Add calculated fiat amount here
                'status' => 'pending', // Default status
            ]);

            // HRA deduction will happen upon admin approval, not here.

            DB::commit();

            return redirect()->route('member.dashboard.index')->with('success', 'Bank transfer request submitted successfully. It is now pending admin review.');

        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error: \Log::error('Bank transfer request failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to submit bank transfer request. Please try again.');
        }
    }
}
