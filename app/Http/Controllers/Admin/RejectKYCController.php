<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KYC;

class RejectKYCController extends Controller
{
    public function store(KYC $kyc)
    {
        if (! $kyc->isPending()) {
            return redirect()->back()->with('error', 'KYC is already approved or rejected');
        }

        $kyc->status = KYC::STATUS_REJECTED;
        $kyc->save();

        return redirect()->route('admin.kycs.index', 'pending')
            ->with('success', 'KYC rejected successfully');
    }
}
