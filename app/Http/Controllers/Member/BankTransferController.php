<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\StoreBankTransferRequest;
use App\ListBuilders\Member\ExportBankTransferRequestBuilder;
use App\Models\BankTransferRequest;
// use App\ListBuilders\ExportLBankTransferRequest;
use App\Models\Member;
use App\Models\Setting;
use App\Models\User;
use App\Traits\CoinTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BankTransferController extends Controller
{
    use CoinTrait;

    /**
     * Display the bank transfer request form.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $user = Auth::user();

        // Check if the user has a related Member record
        if (! $user->member) {
            // Redirect or show an error if no member record exists
            return redirect()->route('member.dashboard.index')->with('error', 'Your do not have any HRA Coin Balance. Please contact support if other issue occurs.');
        }

        // Access coin_wallet_balance from the related Member model
        $hraBalance = $user->member->coin_wallet_balance ?? 0;
        $totalBalanceDollar = toHumanReadable($this->calculateCoinsDollar($hraBalance));

        return view('member.bank-transfer.create', [
            'hraBalance' => $hraBalance,
            'totalBalanceDollar' => $totalBalanceDollar,
        ]);
        // return view('member.bank-transfer.create', compact('hraBalance'));

    }

    // public function list_requests()
    // {
    //     $user = Auth::user();
    //     //get all bank transfer requests for the authenticated user
    //     $bankTransferRequests = BankTransferRequest::where('user_id', $user->id)->get();
    //     // Check if the user has a related Member record
    //     //    echo "<pre>";
    //     // print_r($bankTransferRequests->count());
    //     // echo "</pre>";
    //     // exit;
    //     // if (!$user->member) {
    //     //     // Redirect or show an error if no member record exists
    //     //     return redirect()->route('member.dashboard.index')->with('error', 'Your do not have any HRA Coin Balance. Please contact support if other issue occurs.');
    //     // }
    //     // Access coin_wallet_balance from the related Member model
    //     $hraBalance = $user->member->coin_wallet_balance ?? 0;
    //     // Return the view with the bank transfer requests and HRA balance
    public function list_requests(): Renderable|RedirectResponse|JsonResponse
    {
        return ExportBankTransferRequestBuilder::render([
            'user_id' => Auth::user()->id,
        ]);
    }

    /**
     * Store a new bank transfer request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBankTransferRequest $request)
    {

        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // exit;

        $user = Auth::user();

        $requestedAmountHra = $request->input('amount_hra');

        $exchangeRate = Setting::where('key', 'hra_to_euro_rate')->value('value') ?? 0;

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
                'amount_fiat' => $calculatedFiatAmount,
                'status' => 'pending',
            ]);

            $hraBalance = $user->member->coin_wallet_balance ?? 0;
            $calculatedNewBalance = $hraBalance - $requestedAmountHra;
            $user->member->update(['coin_wallet_balance' => $calculatedNewBalance]);

            // echo "<pre>";
            // print_r($user);
            // echo "</pre>";
            // exit;

            DB::commit();

            // send email to user holding the bank transfer request by mail

            // Prepare email details for the bank transfer request
            // $title = 'Bank Transfer Request Submitted';
            // $body = "Dear {$user->name},<br><br>Your bank transfer request for {$requestedAmountHra} HRA coins (approx. €{$calculatedFiatAmount}) has been submitted and is pending admin review.<br><br>Thank you for using HRA.";

            Mail::to($user->email)->queue(new \App\Mail\BankTransferRequestSubmitted($user, $requestedAmountHra, $calculatedFiatAmount));

            return redirect()->route('member.dashboard.index')->with('success', 'Bank transfer request submitted successfully. It is now pending admin review.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error: \Log::error('Bank transfer request failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to submit bank transfer request. Please try again.');
        }
    }
}
