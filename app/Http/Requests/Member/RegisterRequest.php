<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        Validator::extend('without_spaces', function ($attr, $value) {
            return preg_match('/^\S*$/u', $value);
        });

        return [
            'name' => 'required',
            'email' => 'required|bail|email:rfc,dns|unique:users,email',
            'email_otp' => 'required',
            'password' => [
                'bail',
                'required',
                'without_spaces',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name is required',
            'email_otp.required' => 'The Email OTP is required',
            'country_id.required' => 'The country is required',
            'code.required' => 'The Referral Username is required',
            'code.exists' => 'Member not found',
            'mobile.numeric' => 'The mobile number must be a number',
            'mobile.required' => 'The mobile number is required',
            'email.required' => 'The Email ID is required',
            'email.email' => 'The Email ID must be a valid format',
            'email.unique' => 'You already have an account with this Email ID. Please login with this Email ID',
            'password.required' => 'The password is required',
            'password.min' => 'The password must be at least 6 characters',
            'password.confirmed' => 'The confirm password does not match',
            'password.without_spaces' => 'Space not allowed in password',
            'password.regex' => 'The password format invalid',
        ];
    }
}
