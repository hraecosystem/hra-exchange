<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KYC;
use Illuminate\Http\RedirectResponse;

class ApproveKYCController extends Controller
{
    public function store(KYC $kyc): RedirectResponse
    {
        if (! $kyc->isPending()) {
            return redirect()->back()->with('error', 'KYC is already approved or rejected');
        }

        $kyc->status = KYC::STATUS_APPROVED;
        $kyc->save();

        return redirect()->route('admin.kycs.index')
            ->with('success', 'KYC approved successfully');
    }
}
