<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\Admin\SendMemberPasswordChangedSMS;
use App\Jobs\Admin\SendMemberTransactionPasswordChangedSMS;
use App\Models\Member;
use Hash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Validator;

class ChangeMemberPasswordController extends Controller
{
    /**
     * @return Factory|View
     */
    public function edit(Member $member)
    {
        return view('admin.change-member-password.edit', ['member' => $member]);
    }

    /**
     * @throws ValidationException
     */
    public function update(Member $member, Request $request): RedirectResponse
    {
        Validator::extend('without_spaces', function ($attr, $value) {
            return preg_match('/^\S*$/u', $value);
        });

        $this->validate($request, [
            'password' => [
                'bail',
                'required',
                'without_spaces',
                'confirmed',
            ],
            'password_confirmation' => [
                'bail',
                'required',
                'without_spaces',
            ],
        ], [
            'password.required' => 'The new password is required',
            'password.min' => 'The new password must be at least 6 characters',
            'password.without_spaces' => 'Space not allowed in password',
            'password.regex' => 'The new password format invalid',
            'password.confirmed' => 'The confirm password does not match',
            'password_confirmation.required' => 'The confirm password is required',
            'password_confirmation.without_spaces' => 'Space not allowed in confirm password',
            'password_confirmation.min' => 'The confirm password must be at least 6 characters',
            'password_confirmation.regex' => 'The confirm password format invalid',

        ]);

        if (Hash::check($request->get('password'), $member->user->password)) {
            return redirect()->back()->with(['error' => 'The new password cannot be the same as the previous password. Please choose a different password']);
        }

        $password = $request->get('password');

        $member->user->update([
            'password' => Hash::make($password),
        ]);

        if (settings('sms_enabled')) {
            SendMemberPasswordChangedSMS::dispatch($member, $password);
        }

        return redirect()->route('admin.members.index')->with(['success' => 'Password changed successfully']);
    }

    /**
     * @throws ValidationException
     */
    public function transactionChangePassword(Member $member, Request $request): RedirectResponse
    {
        Validator::extend('without_spaces', function ($attr, $value) {
            return preg_match('/^\S*$/u', $value);
        });
        $this->validate($request, [
            'transaction_password' => 'required|without_spaces|confirmed',
            'transaction_password_confirmation' => 'required|without_spaces',
        ], [
            'transaction_password.without_spaces' => 'The new transaction password cannot contain white spaces',
            'transaction_password.required' => 'The new transaction password is required',
            'transaction_password_confirmation.required' => 'The confirm transaction password is required',
        ]);

        if (Hash::check($request->get('transaction_password'), $member->user->financial_password)) {
            return redirect()->back()->with(['error' => 'The new transaction password cannot be the same as the previous password. Please choose a different password']);
        }

        $password = $request->get('transaction_password');

        $member->user->update([
            'financial_password' => Hash::make($password),
        ]);

        if (settings('sms_enabled')) {
            SendMemberTransactionPasswordChangedSMS::dispatch($member, $password);
        }

        return redirect()->route('admin.members.index')->with(['success' => 'Transaction password changed successfully']);
    }
}
