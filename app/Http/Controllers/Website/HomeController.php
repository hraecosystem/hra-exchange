<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\NewsLetter;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request): Renderable|RedirectResponse
    {
        return view('member.login.create');

    }

    /**
     * @throws ValidationException
     */
    public function contact(Request $request): Factory|View|RedirectResponse
    {
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email:rfc,dns',
                //                'mobile' => 'required|numeric',
                'message' => 'required',
            ],
                [
                    'name.required' => 'The name is required',
                    'mobile.required' => 'The mobile number is required',
                    'mobile.numeric' => 'The mobile number must be a number',
                    'mobile.regex' => 'The mobile number format is invalid',
                    'email.required' => 'The Email ID is required',
                    'email.email' => 'The Email ID must be a valid format',
                    'message.required' => 'The message is required',
                ]
            );

            $inquiry = Inquiry::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                //                'mobile' => $request->input('mobile'),
                'message' => $request->input('message'),
            ]);

            return redirect()->back()->with(['success' => 'Our Team Will Reach You Shortly']);
        }

        return view('website.contact');
    }

    public function terms(): Renderable
    {
        return view('website.terms');
    }

    public function privacyPolicy(): Renderable
    {
        return view('website.privacy-policy');
    }

    public function newLetter(Request $request): Factory|View|RedirectResponse
    {
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'email' => 'required|email:rfc,dns',
            ],
                [
                    'email.required' => 'The Email ID is required.',
                    'email.email' => 'The Email ID must be a valid email address.',
                    'email.unique' => 'The Email ID is already subscribed.',
                ]
            );

            if (NewsLetter::where('email', $request->get('email'))->exists()) {
                return redirect('/')->with([
                    'error' => 'NewLetter already subscribed',
                ]);
            }

            NewsLetter::create([
                'email' => $request->input('email'),
                'ip' => $request->ip(),
            ]);

            return redirect('/')->with([
                'success' => 'NewLetter Subscribe Successfully',
            ]);
        }

        return view('website.home');
    }
}
