<?php

use App\Jobs\ProcessMollieDeposit;
use App\Mail\SendGeneralMail;
use App\Models\City;
use App\Models\Deposit;
use App\Models\Member;
use App\Models\State;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::any('mollie/{orderNo}/webhook', function ($orderNo) {
    $deposit = Deposit::whereOrderNo($orderNo)->firstOrFail();

    ProcessMollieDeposit::dispatch($deposit);

    return 'ok';
})->name('mollie.webhook');

Route::group([
    'namespace' => 'Website',
    'as' => 'website.',
], function () {
    Route::any('/', 'HomeController@index')->name('home');

    Route::post('customer-message', function () {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $user = [
            'name' => request()->input('name'),
            'email' => request()->input('email'),
        ];

        $title = 'Website Message';

        $body = request()->input('message');

        Mail::to('info@hra-coin.com')
            ->queue(new SendGeneralMail($user, $title, $body));

        return redirect()->back()->with('success', 'Message sent successfully');
    })->name('customer-message');

    //    Route::any('contact', 'HomeController@contact')->name('contact');
    //    Route::get('about', 'HomeController@about')->name('about');
    //    Route::get('message', 'HomeController@message')->name('message');
    //    Route::get('terms', 'HomeController@terms')->name('terms');
    //    Route::get('legal', 'HomeController@legal')->name('legal');
    //    Route::get('package', 'HomeController@package')->name('package');
    //    Route::get('faqs', 'HomeController@faqs')->name('faqs');
    //    Route::get('gallery', 'HomeController@gallery')->name('gallery');
    //    Route::get('gallery-details/{photoGallery}', 'HomeController@galleryDetails')->name('gallery-details');
    //    Route::get('plan', 'HomeController@plan')->name('plan');
    //    Route::get('return-policy', 'HomeController@returnPolicy')->name('return-policy');
    //    Route::get('privacy-policy', 'HomeController@privacyPolicy')->name('privacy-policy');
    //    Route::any('newletter', 'HomeController@newLetter')->name('newletter');
});

Route::get('member/{member}/name', function (Member $member) {
    return response()->json([
        'user' => [
            'name' => optional($member->user)->name,
        ],
    ]);
})->name('members.show');

Route::get('district/{state_id}', function ($state_id) {
    $districts = City::where('state_id', $state_id)->get();

    return response()->json($districts);
})->name('district.show');

Route::get('state', function () {
    return response()->json([
        'states' => State::with('cities')->get(),
    ]);
})->name('state');

Route::get('city/{state_id?}', function (Illuminate\Http\Request $request) {
    if ($request->get('state_id')) {
        $city = City::where('state_id', $request->get('state_id'))->get();
    } else {
        $city = City::get();
    }

    return response()->json(['cities' => $city]);
})->name('city');

//Webhook strip route
use App\Http\Controllers\Webhook\StripeWebhookController;

Route::post('/stripe/webhook', [StripeWebhookController::class, 'handle']);
