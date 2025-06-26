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
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class RegisterController extends Controller
{
    public function create(): Renderable
    {
        return view('member.auth.register', [
            'countries' => Country::get(),
            'hra_errors' => [],
        ]);
    }

    public function register(Request $request)
    {
        /* 1. Validation locale ------------------------------------------- */
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:20',
        ]);

        /* 2. Construction de la charge utile pour l’API externe ---------- */
        $payload = [
            'email' => $validated['email'],
            'password' => $validated['password'],
            'firstname' => $validated['name'],
            'lastname' => $validated['last_name'],
            'phonenumber' => $validated['phonenumber'],
        ];

        try {
            /* 3. Appel de l’API externe en premier ------------------------ */
            $response = Http::post('https://auth.hra-web3.com/api/auth/register', $payload);

            if (! $response->successful()) {
                $data = $response->json();
                $errors = [];
                $error_path = '';
                if (isset($data['path'])) {
                    switch ($data['path'][0]) {
                        case 'firstname':
                            $error_path = 'name';
                            break;
                        case 'lastname':
                            $error_path = 'last_name';
                            break;

                        default:
                            $error_path = $data['path'][0];
                            break;
                    }

                    $errors[$error_path] = $data['message'];

                    return redirect()->back()
                        ->withInput()
                        ->withErrors($errors);
                }
            }

            /* 4. Création du compte local dans une transaction ------------ */
            DB::transaction(function () use ($validated) {
                $user = User::create([
                    'name' => $validated['name'],
                    'lastname' => $validated['last_name'],
                    'email' => $validated['email'],
                    'mobile' => $validated['phonenumber'],
                    'password' => Hash::make($validated['password']),
                ]);

                $user->assignRole('member');

                Member::create([
                    'user_id' => $user->id,
                    'status' => Member::STATUS_FREE_MEMBER,
                ]);
            });

            /* 5. Redirection pour la saisie de l’OTP ---------------------- */
            return view('member.auth.otp', [
                'email' => $validated['email'],
                'name' => $validated['name'],
                'last_name' => $validated['last_name'],
            ]);
        } catch (\Throwable $e) {
            // time‑out réseau, exception DB, etc. – la transaction est annulée
            return response()->json([
                'error' => 'internal_server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function verificationOtp(Request $request)
    {

        $data = [
            'otp' => implode('', [
                $request->input('otp_1'),
                $request->input('otp_2'),
                $request->input('otp_3'),
                $request->input('otp_4'),
                $request->input('otp_5'),
                $request->input('otp_6'),
            ]),
        ];

        try {
            $response = Http::post('https://auth.hra-web3.com/api/auth/verify-otp', [
                'email' => $request->input('email'),
                'otp' => $data['otp'],
            ]);

            if ($response->successful()) {
                return redirect()->route('member.login.create')->with([
                    'success' => 'OTP verified successfully. Please continue registration.',
                    'email' => $request->input('email'),
                ]);
            } else {
                return redirect()->back()->withErrors([
                    'faile' => 'Invalid OTP or expired. Please try again',
                    'otp' => 'Invalid OTP or expired. Please try again.',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur de communication avec l’API',
                'message' => $e->getMessage(),
            ], 500);
        }
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

    public function saveUserData()
    {
        try {
            $users = User::all();
            $chunks = $users->chunk(50); // Send 50 users at a time

            foreach ($chunks as $chunk) {
                $data = $chunk->map(function ($user) {
                    $names = explode(' ', $user->name, 2);
                    $firstName = $names[0];
                    $lastName = $names[1] ?? ($user->lastname ?? '');

                    return [
                        'firstname' => $firstName,
                        'lastname' => $lastName,
                        'email' => $user->email,
                        'phonenumber' => $user->mobile ?: '09'.rand(100000000, 999999999),
                        'password' => $user->password,
                        'ID_from_app' => $user->id,
                    ];
                })->toArray();

                $response = Http::timeout(120)
                    ->withHeaders(['Content-Type' => 'application/json'])
                    ->post('https://auth.hra-web3.com/api/auth/saveData', [
                        'users' => $data,
                    ]);

                if (! $response->successful()) {
                    Log::error('User sync failed on batch: '.$response->body());
                    throw new \Exception('Failed to save user data: '.$response->body());
                }
            }

            return response()->json(['status' => true, 'message' => 'User data saved successfully']);
        } catch (\Throwable $e) {
            return response()->json(['status' => false, 'message' => 'Error saving user data: '.$e->getMessage()]);
        }
    }

    public function saveUsers($data)
    {
        $req = Http::timeout(120)->post('https://auth.hra-web3.com/api/auth/saveData', $data);

        if (! $req->successful()) {
            throw new \Exception('Failed to save user data: '.$req->body());
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
