<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Jobs\Member\SendForgotPasswordSMS;
use App\Mail\SendGeneralMail;
use App\Models\Member;
use Closure;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use Egulias\EmailValidator\Validation\RFCValidation;
use Hash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Mail;
use Str;

class ForgotPasswordController extends Controller
{
    public function create(): Factory|View
    {
        return view('member.auth.forget');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => [
                'bail',
                'required',
                function (string $attribute, mixed $value, Closure $fail) {

                    $validator = new EmailValidator;

                    if (! $validator
                        ->isValid(
                            $value,
                            new MultipleValidationWithAnd([
                                new DNSCheckValidation,
                                new RFCValidation,
                            ])
                        )
                    ) {
                        $fail('The Email ID must be a valid format');
                    }
                },
                'exists:users,email',
            ],
        ], [
            'email.required' => 'The Email ID is required',
            'email.exists' => 'Email ID is incorrect',
        ]);

        $email = $request->input('email');

        if ($member = Member::whereHas('user', function (Builder $q) use ($email) {
            $q->where('email', $email);
        })->first()) {
            if ($member->isBlocked()) {
                return redirect()->back()->with('error', 'Member is blocked')->withInput();
            }

            $password = Str::password(8);

            $response = Http::post('https://auth.hra-web3.com/api/password/reset-password', [
                'email' => $request->get('email'),
                'password' => $password,
            ]);

            if (! $response->successful()) {
                return redirect()->back()->with('error', 'The Email tesfsaoihx;');
            }

            $member->user->update(['password' => Hash::make($password)]);

            if (settings('sms_enabled')) {
                SendForgotPasswordSMS::dispatch($member, $password);
            }

            if (settings('email_enabled')) {
                $title = 'Forgot Password';
                $body = sprintf(
                    'We have received a reset password request. Please login with your new password.',
                );
                $user = [
                    'name' => $member->user->name,
                    'email' => $member->user->email,
                ];

                Mail::to($user['email'])->send(new SendGeneralMail($user, $title, $body, $password));
            }

            return redirect()
                ->route('member.login.create')
                ->with(['success' => 'Password sent successfully to your registered Email ID']);
        } else {
            return redirect()->back()->with('error', 'Email ID is invalid');
        }
    }
}
