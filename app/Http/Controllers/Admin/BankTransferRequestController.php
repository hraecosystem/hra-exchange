<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankTransferRequest;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Notifications\BankTransferRequestApproved; // Import the approved notification
use App\Notifications\BankTransferRequestRejected; // Import the rejected notification

class BankTransferRequestController extends Controller
{
    /**
     * Display a listing of the bank transfer requests.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $requests = BankTransferRequest::with('user.member')
            ->latest()
            ->get();

        return view('admin.bank-transfer-requests.index', compact('requests'));
    }

    /**
     * Display the specified bank transfer request.
     *
     * @param  \App\Models\BankTransferRequest  $bankTransferRequest
     * @return \Illuminate\View\View
     */
    public function show(BankTransferRequest $bankTransferRequest)
    {
        $bankTransferRequest->load('user.member');

        return view('admin.bank-transfer-requests.show', compact('bankTransferRequest'));
    }

    /**
     * Approve the specified bank transfer request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankTransferRequest  $bankTransferRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(Request $request, BankTransferRequest $bankTransferRequest)
    {
        if ($bankTransferRequest->status !== 'pending') {
            return redirect()->back()->with('error', 'This request has already been processed.');
        }

        // TODO: Add validation for payment proof upload if you uncomment that route
        // $request->validate(['payment_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048']);

        try {
            DB::beginTransaction();

            $member = $bankTransferRequest->user->member;

            if (!$member) {
                 throw new \Exception("Member record not found for user ID: " . $bankTransferRequest->user_id);
            }

            if ($member->coin_wallet_balance < $bankTransferRequest->amount_hra) {
                 throw new \Exception("Insufficient HRA balance for user ID: " . $bankTransferRequest->user_id);
            }

            $member->coin_wallet_balance = bcsub($member->coin_wallet_balance, $bankTransferRequest->amount_hra, 8);
            $member->save();

            $paymentProofPath = null;
            if ($request->hasFile('payment_proof')) {
                $paymentProofPath = $request->file('payment_proof')->store('payment_proofs');
            } else {
                 $paymentProofPath = $request->input('transaction_id');
            }

            $bankTransferRequest->status = 'approved';
            $bankTransferRequest->payment_proof = $paymentProofPath;
            $bankTransferRequest->admin_notes = $request->input('admin_notes');
            $bankTransferRequest->save();

            // Send approval notification to the user
            $bankTransferRequest->user->notify(new BankTransferRequestApproved($bankTransferRequest));

            DB::commit();

            return redirect()->route('admin.bank-transfer-requests.index')->with('success', 'Bank transfer request approved successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            // Log the error: \Log::error('Bank transfer request approval failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to approve bank transfer request: ' . $e->getMessage());
        }
    }

    /**
     * Reject the specified bank transfer request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankTransferRequest  $bankTransferRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, BankTransferRequest $bankTransferRequest)
    {
         if ($bankTransferRequest->status !== 'pending') {
            return redirect()->back()->with('error', 'This request has already been processed.');
        }

        // TODO: Add validation for rejection notes if required
        // $request->validate(['admin_notes' => 'required|string']);

        try {
            DB::beginTransaction();

            $bankTransferRequest->status = 'rejected';
            $bankTransferRequest->admin_notes = $request->input('admin_notes');
            $bankTransferRequest->save();

            // Send rejection notification to the user
            $bankTransferRequest->user->notify(new BankTransferRequestRejected($bankTransferRequest));

            DB::commit();

            return redirect()->route('admin.bank-transfer-requests.index')->with('success', 'Bank transfer request rejected successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            // Log the error: \Log::error('Bank transfer request rejection failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to reject bank transfer request: ' . $e->getMessage());
        }
    }
}
