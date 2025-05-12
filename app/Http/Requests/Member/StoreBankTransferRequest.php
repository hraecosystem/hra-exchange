<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBankTransferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Only authenticated members should be authorized
        return Auth::check() && Auth::user()->member;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Fetch the user's current HRA balance from the Member model
        $user = Auth::user();
        $maxHraAmount = $user->member->coin_wallet_balance ?? 0;

        return [
            'bank_name' => ['required', 'string', 'max:255'],
            'account_name' => ['required', 'string', 'max:255'],
            'iban' => ['required', 'string', 'max:34'], // IBAN max length is 34 characters
            'swift_code' => ['nullable', 'string', 'max:11'], // SWIFT/BIC max length is 11 characters
            'amount_hra' => ['required', 'numeric', 'gt:0', 'decimal:0,8', 'max:' . $maxHraAmount], // Must be greater than 0, up to 8 decimal places, and not exceed balance
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'amount_hra.max' => 'The requested amount exceeds your current HRA Coin balance.',
            'amount_hra.gt' => 'The amount must be greater than 0.',
            'amount_hra.decimal' => 'The amount must have up to 8 decimal places.',
        ];
    }
}
