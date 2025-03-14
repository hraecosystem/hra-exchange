<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\RegisterRequest;
use App\Jobs\Member\SendRegisteredSMS;
use App\Mail\SendGeneralMail;
use App\Models\Country;
use App\Models\Member;
use App\Models\Otp;
use App\Models\User;
use Auth;
use DB;
use Hash;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Mail;
use Throwable;

class RegisterController extends Controller
{
    public function create(): Renderable
    {
        return view('member.auth.register', [
            'countries' => Country::get(),
        ]);
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        try {
            $password = $request->input('password');

            return DB::transaction(function () use ($request, $password) {
                if (User::whereEmail($request->input('email'))->lockForUpdate()->exists()) {
                    return redirect()->back()->with(['error' => 'You already have an account with this Email ID. Please Login with this Email ID']);
                }

                if (Otp::where('email', $request->input('email'))
                    ->where('type', Otp::ACTION_REGISTER)
                    ->where('otp', $request->get('email_otp'))
                    ->lockForUpdate()
                    ->doesntExist()
                ) {
                    return redirect()->back()->with('error', 'Email OTP is Invalid')->withInput();
                }

                $user = User::create([
                    'country_id' => $request->get('country_id'),
                    'name' => ucwords($request->get('name')),
                    'email' => $request->get('email'),
                    'mobile' => $request->get('mobile'),
                    'password' => Hash::make($password),
                ]);
                $user->assignRole('member');

                $member = Member::create([
                    'user_id' => $user->id,
                    'status' => Member::STATUS_FREE_MEMBER,
                ]);

                //                $account = Accounts::create();
                //                $member->userWallet()->create([
                //                    'public_key' => $account->address,
                //                    'private_key' => $account->privateKey,
                //                ]);

                if (settings('email_enabled') && env('APP_ENV') !== 'local') {
                    $users = [
                        'email' => $member->user->email,
                        'name' => $member->user->name,
                    ];
                    $title = 'Register';

                    $body = "<b>Congratulations! You have successfully registered with HRA.</b> <br><br><b>Account Details:</b> <br> <p style='color:#455056; font-size:15px;line-height:20px; margin:0; font-weight: 500;margin-bottom: 15px;'> <strong style='display: block;font-size: 13px; margin: 0 0 4px; color:rgba(0,0,0,.64); font-weight:normal;'>Email ID</strong>{$member->user->email} <strong style='display: block; font-size: 13px; margin: 10px 0 4px 0; font-weight:normal; color:rgba(0,0,0,.64);'>Password</strong>$password </p> <p style='color:#455056; font-size:13px;line-height:20px; margin:0; font-weight: 500;margin-bottom: 15px;'>Please keep your login credentials secure and do not share them with anyone. If you have any questions or concerns, feel free to contact our support team. </p><p style='color:#455056; font-size:13px;line-height:20px; margin:0; font-weight: 600;margin-bottom: 15px;'> Thank you for choosing HRA. We look forward to providing you with a seamless experience. </p>";

                    Mail::to($users['email'])->queue(new SendGeneralMail($users, $title, $body));
                }

                if (settings('sms_enabled')) {
                    SendRegisteredSMS::dispatch($member, $password);
                }

                Otp::where('email', $request->input('email'))
                    ->where('type', Otp::ACTION_REGISTER)
                    ->delete();

                Auth::login($member->user, $request->get('remember'));

                return redirect()->route('member.dashboard.index');
            });
        } catch (Throwable $e) {
            return $this->logExceptionAndRespond($e);
        }
    }

    public function sendEmailOTP(Request $request): JsonResponse
    {
        $this->validate($request, [
            'email' => 'required|bail|email:rfc,dns|unique:users,email',
        ], [
            'email.required' => 'The Email ID is required',
            'email.email' => 'The Email ID must be a valid format',
            'email.unique' => 'You already have an account with this Email ID. Please login with this Email ID',
        ]);

        $user = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        if (! preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $request->input('email'))) {
            return response()->json(['status' => false, 'message' => 'Email ID format is invalid']);
        }

        if (User::whereEmail($request->input('email'))->exists()) {
            return response()->json(['status' => false, 'message' => 'You already have an account with this Email ID. Please login with this Email ID']);
        }

        if (env('APP_ENV') === 'production') {
            $otp = rand('100001', '999999');
        } else {
            $otp = 111111;
        }

        Otp::create([
            'otp' => $otp,
            'email' => $request->input('email'),
            'status' => Otp::STATUS_UNUSED,
            'type' => Otp::ACTION_REGISTER,
        ]);

        if (settings('email_enabled')) {
            $title = 'Register OTP';
            $body = 'Thank you for initiating the registration process. To complete your registration, please use the One-Time Password (OTP) provided below:';
            Mail::to($user['email'])->queue(new SendGeneralMail($user, $title, $body, $otp));
        }

        return response()->json(['status' => true, 'message' => 'OTP sent to you successfully']);
    }
}
