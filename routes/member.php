<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Member',
    'as' => 'member.',
    'prefix' => 'user',
], function () {
    Route::get('', 'LoginController@create')->name('login.create');
    Route::post('login', 'LoginController@store')->name('login.store');

    Route::get('register', 'RegisterController@create')->name('register.create');
    Route::post('register', 'RegisterController@store')->name('register.store');
    Route::post('send-email-otp', 'RegisterController@sendEmailOTP')->name('send-email-otp');

    Route::get('forgot-password', 'ForgotPasswordController@create')->name('forgot-password.create');
    Route::post('forgot-password', 'ForgotPasswordController@store')->name('forgot-password.store');

    Route::group([
        'middleware' => ['memberAuth'],
    ], function () {
        Route::get('logout', 'LoginController@destroy')->name('login.destroy');
        Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
        Route::get('members/{member}/show', 'MemberController@show')->name('members.show');

        Route::get('toggle-theme', 'ToggleThemeController@update')->name('toggle-theme');

        Route::group([
            'prefix' => 'profile',
            'as' => 'profile.',
        ], function () {
            Route::get('', 'ProfileController@show')->name('show');
            Route::post('update', 'ProfileController@update')->name('update');
        });

        Route::get('kyc', 'KYCController@show')->name('kycs.show');
        Route::put('kyc', 'KYCController@update')->name('kycs.update');

        Route::post('change-password', 'ChangePasswordController@update')->name('change-password.update');

        Route::group([
            'prefix' => 'withdrawals',
            'as' => 'withdrawals.',
        ], function () {
            Route::get('', 'WithdrawalController@index')->name('show');
            Route::get('create', 'WithdrawalController@create')->name('create');
            Route::post('store', 'WithdrawalController@store')->name('store');
        });

        Route::get('wallet-transactions', 'WalletTransactionController@index')->name('wallet-transactions.index');
        Route::get('coin-wallet-transactions', 'CoinWalletTransactionController@index')->name('coin-wallet-transactions.index');

        Route::group([
            'prefix' => 'deposit',
            'as' => 'deposit.',
        ], function () {
            Route::get('', 'DepositController@index')->name('index');
            Route::get('detail', 'DepositController@detail')->name('detail');
            Route::get('create', 'DepositController@create')->name('create');
            Route::post('store', 'DepositController@store')->name('store');
            Route::any('process/{orderNo}', 'ProcessDepositController@store')->name('process');
        });

        Route::group([
            'prefix' => 'p2p-transfers',
            'as' => 'p2p-transfers.',
        ], function () {
            Route::get('', 'P2PTransferController@index')->name('index');
            Route::get('create', 'P2PTransferController@create')->name('create');
            Route::post('store', 'P2PTransferController@store')->name('store');
        });

        Route::group([
            'prefix' => 'reports',
            'as' => 'reports.',
        ], function () {
            Route::get('ico-purchase', 'ReportController@IcoPurchase')->name('purchase');
            Route::get('ico-purchase-bonus', 'ReportController@IcoPurchaseBonus')->name('purchase-bonus');
        });

        Route::get('exports', 'ExportController@index')->name('exports.index');

        Route::group([
            'prefix' => 'support',
            'as' => 'support.',
        ], function () {
            Route::get('', 'SupportTicketController@index')->name('index');
            Route::get('create', 'SupportTicketController@create')->name('create');
            Route::post('', 'SupportTicketController@store')->name('store');
            Route::get('{id}/ticket', 'SupportTicketController@ticket')->name('ticket');
            Route::post('{id}/ticket-message', 'SupportTicketController@ticketMessage')->name('ticketMessage');
        });

        Route::group([
            'prefix' => 'unlock-lth',
            'as' => 'unlock-lth.',
        ], function () {
            Route::get('', 'UnlockLTHController@index')->name('index');
        });

        // Add the bank transfer routes here, inside the 'memberAuth' middleware group
        Route::group([
            'prefix' => 'bank-transfer',
            'as' => 'bank-transfer.',
        ], function () {
            // Route::get('/', [App\Http\Controllers\Member\BankTransferController::class, 'list_requests'])->name('list_requests');
            Route::get('/', [App\Http\Controllers\Member\BankTransferController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Member\BankTransferController::class, 'store'])->name('store');
        });
        // Add the bank transfer routes here, inside the 'memberAuth' middleware group
        Route::group([
            'prefix' => 'list-requests',
            'as' => 'list-requests.',
        ], function () {
            Route::get('', 'BankTransferController@list_requests')->name('list_requests');

            // Route::get('/', [App\Http\Controllers\Member\BankTransferController::class, 'list_requests'])->name('list_requests');
            // Route::get('/', [App\Http\Controllers\Member\BankTransferController::class, 'create'])->name('create');
            // Route::post('/', [App\Http\Controllers\Member\BankTransferController::class, 'store'])->name('store');
        });

    });
});
