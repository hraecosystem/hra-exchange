<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                return redirect()->route('member.dashboard.index');
            }

            return $next($request);
        })->only('create', 'store');
    }

    public function create(): Factory|View
    {
        return view('member.login.create');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            'remember' => 'boolean',
        ], [
            'email.required' => 'The Email ID is required',
            'password.required' => 'The password is required',
        ]);

        $email = $request->input('email');
        if ($member = Member::whereHas('user', function (Builder $q) use ($email) {
            $q->where('email', $email);
        })
            ->first()) {
            if ($member->isBlocked()) {
                return redirect()->back()->with(['error' => 'User is blocked'])->withInput();
            }

            if (Hash::check($request->get('password'), $member->user->password)) {
                Auth::login($member->user, $request->get('remember'));

                if ($ip = $request->ip()) {
                    $member->loginLogs()->create([
                        'ip' => $ip,
                    ]);
                }

                return redirect()->route('member.dashboard.index');
            }
        }

        return redirect()->back()->with(['error' => 'Email ID or Password is incorrect'])->withInput();
    }

    public function destroy(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('member.login.create');
    }
}
