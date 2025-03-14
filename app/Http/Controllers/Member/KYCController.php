<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\KYC;
use Auth;
use DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Sentry;
use Throwable;

class KYCController extends Controller
{
    public function show()
    {
        $kyc = $this->member->kyc;

        return view('member.profile.kyc.show', [
            'member' => Auth::user()->member,
            'kyc' => $kyc,
            'panCardImage' => $kyc->getFirstMediaUrl(KYC::MC_PAN_CARD),
            'aadhaarCardImage' => $kyc->getFirstMediaUrl(KYC::MC_AADHAAR_CARD),
            'aadhaarCardBackImage' => $kyc->getFirstMediaUrl(KYC::MC_AADHAAR_CARD_BACK),
            'cancelChequeImage' => $kyc->getFirstMediaUrl(KYC::MC_CANCEL_CHEQUE),
        ]);
    }

    /**
     * @return RedirectResponse|mixed
     *
     * @throws ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'pan_card' => 'required|regex:/^[A-Z]{5}[0-9]{4}[A-Z]$/',
            'aadhaar_card' => 'required|digits:12',
            'account_name' => 'required',
            'account_number' => 'required|digits_between:9,18',
            'account_type' => 'required|in:'.implode(',', array_keys(KYC::ACCOUNT_TYPES)),
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'bank_ifsc' => 'required|min:11|max:11|alpha_num',
            'pan_card_image' => 'required',
            'aadhaar_card_image' => 'required',
            'aadhaar_card_back_image' => 'required',
            'cancel_cheque_image' => 'required',
        ], [
            'pan_card.required' => 'The PAN Card is required',
            'pan_card.regex' => 'The PAN card format is invalid',
            'aadhaar_card.required' => 'The aadhaar card is required',
            'account_number.required' => 'The account number is required',
            'account_type.required' => 'The account type is required',
            'bank_name.required' => 'The bank name is required',
            'bank_branch.required' => 'The bank branch is required',
            'bank_ifsc.min' => 'The IFSC code length must be 11.',
            'bank_ifsc.max' => 'The IFSC code length must be 11.',
            'bank_ifsc.alpha_num' => 'The IFSC may only contain letters and digits.',
            'bank_ifsc.required' => 'The IFSC code is required.',
            'account_name.required' => 'The account holder name is required.',
        ]);

        try {
            return DB::transaction(function () use ($request) {
                /** @var KYC $kyc */
                $kyc = $this->member->kyc()->updateOrCreate([
                    'id' => optional($this->member->kyc)->id,
                ], [
                    'pan_card' => $request->get('pan_card'),
                    'aadhaar_card' => $request->get('aadhaar_card'),
                    'account_name' => $request->get('account_name'),
                    'account_number' => $request->get('account_number'),
                    'account_type' => $request->get('account_type'),
                    'bank_name' => $request->get('bank_name'),
                    'bank_branch' => $request->get('bank_branch'),
                    'bank_ifsc' => $request->get('bank_ifsc'),
                    'status' => KYC::STATUS_PENDING,
                ]);

                if ($fileName = $request->get('pan_card_image')) {
                    $filePath = 'tmp/'.Str::beforeLast($fileName, '.');

                    $kyc->addMediaFromDisk($filePath)
                        ->usingFileName($fileName)
                        ->toMediaCollection(KYC::MC_PAN_CARD);
                }

                if ($fileName = $request->get('aadhaar_card_image')) {
                    $filePath = 'tmp/'.Str::beforeLast($fileName, '.');

                    $kyc->addMediaFromDisk($filePath)
                        ->usingFileName($fileName)
                        ->toMediaCollection(KYC::MC_AADHAAR_CARD);
                }

                if ($fileName = $request->get('aadhaar_card_back_image')) {
                    $filePath = 'tmp/'.Str::beforeLast($fileName, '.');

                    $kyc->addMediaFromDisk($filePath)
                        ->usingFileName($fileName)
                        ->toMediaCollection(KYC::MC_AADHAAR_CARD_BACK);
                }

                if ($fileName = $request->get('cancel_cheque_image')) {
                    $filePath = 'tmp/'.Str::beforeLast($fileName, '.');

                    $kyc->addMediaFromDisk($filePath)
                        ->usingFileName($fileName)
                        ->toMediaCollection(KYC::MC_CANCEL_CHEQUE);
                }

                return redirect()->route('member.kycs.show')->with(['success' => 'KYC saved successfully']);
            });
        } catch (Throwable $e) {
            Sentry::captureException($e);

            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
