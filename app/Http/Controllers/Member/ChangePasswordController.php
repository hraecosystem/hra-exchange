<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Validator;

class ChangePasswordController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function update(Request $request): RedirectResponse
    {
        Validator::extend('without_spaces', function ($attr, $value) {
            return preg_match('/^\S*$/u', $value);
        });

        $this->validate($request, [
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (! Hash::check($value, Auth::user()->password)) {
                        $fail('Old password is invalid');
                    }
                },
            ],
            'password' => [
                'confirmed',
                'different:old_password',
                'bail',
                'required',
                'without_spaces',
                'confirmed',
            ],
            'password_confirmation' => ['bail',
                'required',
                'without_spaces',
            ],
        ], [
            'old_password.required' => 'The old password is required',
            'password.required' => 'The new password is required',
            'password.confirmed' => 'The confirm password does not match',
            'password.without_spaces' => 'Space not allowed in new password',
            'password.different' => 'The new password cannot be the same as the previous password. Please choose a different password',
            'password.min' => 'The password must be at least 6 characters',
            'password_confirmation.required' => 'The confirm password is required',
            'password_confirmation.without_spaces' => 'Space not allowed in confirm password',
            'password_confirmation.min' => 'The confirm password must be at least 6 characters',
            'password.regex' => 'The new password format invalid',
            'password_confirmation.regex' => 'The confirm password format invalid',
        ]);

        if (Hash::check($request->get('password'), $this->member->user->password)) {
            return redirect()->back()->with(['error' => 'The new password cannot be the same as the previous password. Please choose a different password']);
        }

        $this->user->update([
            'password' => Hash::make($request->get('password')),
        ]);

        return redirect()->back()->with(['success' => 'Password changed successfully']);
    }
}
