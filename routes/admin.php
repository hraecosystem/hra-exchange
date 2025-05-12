<?php

Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('', 'LoginController@create')->name('login.create');
    Route::post('', 'LoginController@store')->name('login.store');
    Route::get('get/state/{country_id_or_name}', 'StateController@getState')->name('get-state');
    Route::get('get/city/{state_id_or_name}', 'StateController@getCity')->name('get-city');

    Route::get('forgot-password', 'ForgotPasswordController@create')->name('forgot-password.create');
    Route::post('forgot-password/send-otp', 'ForgotPasswordController@sendOtp')->name('forgot-password.send-otp');
    Route::post('forgot-password', 'ForgotPasswordController@store')->name('forgot-password.store');
    Route::get('{member}/detail', 'MemberController@detail')->name('members.detail');

    if (env('APP_ENV') !== 'production') {
        Route::get('mining-reward-income', function () {
            \App\Jobs\CalculateDailyMiningReward::dispatch(now());
        });
    }

    Route::group([
        'middleware' => ['adminAuth'],
    ], function () {
        Route::post('uploads/process', 'UploadController@process');

        Route::get('logout', 'LoginController@destroy')->name('login.destroy');
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        Route::get('password/edit', 'PasswordController@edit')->name('password.edit');
        Route::post('password/update', 'PasswordController@update')->name('password.update');

        Route::get('toggle-theme', 'ToggleThemeController@update')->name('toggle-theme');

        Route::group([
            'prefix' => 'users',
            'as' => 'members.',
        ], function () {
            Route::get('', 'MemberController@index')->name('index')->middleware('permission:Members-read');
            Route::get('{member}/show', 'MemberController@show')->name('show')->middleware('permission:Members-read');
            Route::get('{member}/edit', 'MemberController@edit')->name('edit')->middleware('permission:Members-update');
            Route::patch('{member}/update', 'MemberController@update')->name('update')->middleware('permission:Members-update');
            Route::get('{member}/log', 'MemberController@memberLog')->name('log')->middleware('permission:Members-read');

            Route::post('{member}/block', 'BlockMemberController@store')->name('block.store')->middleware('permission:Members-create');
            Route::delete('{member}/block', 'BlockMemberController@destroy')->name('block.destroy')->middleware('permission:Members-update');

            Route::get('{member}/change-password', 'ChangeMemberPasswordController@edit')->name('change-password.edit')->middleware('permission:Members-update');
            Route::patch('{member}/change-password', 'ChangeMemberPasswordController@update')->name('change-password.update')->middleware('permission:Members-update');
            Route::patch('{member}/transaction-change-password', 'ChangeMemberPasswordController@transactionChangePassword')->name('transaction-change-password.update')->middleware('permission:Members-update');

            Route::post('{member}/impersonate', 'MemberImpersonateController@store')
                ->name('impersonate.store')->middleware('permission:Members-read');
        });

        Route::group([
            'prefix' => 'admins',
            'as' => 'admins.',
        ], function () {
            Route::get('', 'AdminController@index')->name('index')->middleware('permission:Admins-read');
            Route::get('create', 'AdminController@create')->name('create')->middleware('permission:Admins-read');
            Route::post('store', 'AdminController@store')->name('store')->middleware('permission:Admins-create');
            Route::get('{admin}/edit', 'AdminController@edit')->name('edit')->middleware('permission:Admins-update');
            Route::post('{admin}/update', 'AdminController@update')->name('update')->middleware('permission:Admins-update');
            Route::get('{admin}/update-status', 'AdminController@updateStatus')->name('update-status')->middleware('permission:Admins-update');
            Route::get('{admin}/change-password', 'AdminController@changePassword')->name('change-password')->middleware('permission:Admins-update');
            Route::post('{admin}/change-password', 'AdminController@changePasswordUpdate')->name('change-password-update')->middleware('permission:Admins-update');
        });

        //        Route::group([
        //            'prefix' => 'kycs',
        //            'as' => 'kycs.',
        //        ], function () {
        //            Route::get('', 'KYCController@index')->name('index')->middleware('permission:KYCS-read');
        //            Route::get('{kyc}/show', 'KYCController@show')->name('show')->middleware('permission:KYCS-read');
        //            Route::get('{kyc}/edit', 'KYCController@edit')->name('edit')->middleware('permission:KYCS-update');
        //            Route::put('{kyc}', 'KYCController@update')->name('update')->middleware('permission:KYCS-update');
        //            Route::post('approve/{kyc}', 'ApproveKYCController@store')->name('approve')->middleware('permission:KYCS-update');
        //            Route::post('reject/{kyc}', 'RejectKYCController@store')->name('reject')->middleware('permission:KYCS-update');
        //        });

        Route::group([
            'prefix' => 'deposit',
            'as' => 'deposit.',
        ], function () {
            Route::get('', 'DepositController@index')->name('index')->middleware('permission:Deposits-view');
            Route::get('create', 'DepositController@create')->name('create')->middleware('permission:Deposits-update');
            Route::post('store', 'DepositController@store')->name('store')->middleware('permission:Deposits-update');
        });

        Route::group([
            'prefix' => 'p2p-transfers',
            'as' => 'p2p-transfers.',
        ], function () {
            Route::get('', 'P2PTransferController@index')->name('index')->middleware('permission:P2P Transfers-view');
            Route::get('create', 'P2PTransferController@create')->name('create')->middleware('permission:P2P Transfers-update');
            Route::post('store', 'P2PTransferController@store')->name('store')->middleware('permission:P2P Transfers-update');
        });

        Route::group([
            'prefix' => 'wallet-transactions',
            'as' => 'wallet-transactions.',
        ], function () {
            Route::get('', 'WalletTransactionController@index')->name('index')->middleware('permission:Wallet-read');
            Route::get('create', 'WalletTransactionController@create')->name('create')->middleware('permission:Wallet-create');
            Route::post('', 'WalletTransactionController@store')->name('store')->middleware('permission:Wallet-create');
        });

        Route::group([
            'prefix' => 'coin-wallet-transactions',
            'as' => 'coin-wallet-transactions.',
        ], function () {
            Route::get('', 'CoinWalletTransactionController@index')->name('index')->middleware('permission:Coin Wallet-read');
            Route::get('create', 'CoinWalletTransactionController@create')->name('create')->middleware('permission:Coin Wallet-create');
            Route::post('', 'CoinWalletTransactionController@store')->name('store')->middleware('permission:Coin Wallet-create');
        });

        Route::group([
            'prefix' => 'reports',
            'as' => 'reports.',
        ], function () {
            Route::get('ico-purchase', 'ReportController@IcoPurchase')->name('purchase')->middleware('permission:Reports-read');
            Route::get('ico-purchase-bonus', 'ReportController@IcoPurchaseBonus')->name('purchase-bonus')->middleware('permission:Reports-read');
        });

        Route::get('exports', 'ExportController@index')->name('exports.index')->middleware('permission:Exports-read');

        Route::get('contact-inquiries', 'ContactInquiryController@index')->name('contactInquires.index')->middleware('permission:Contact Inquiries-read');

        Route::group([
            'prefix' => 'support-ticket',
            'as' => 'support-ticket.',
        ], function () {
            Route::get('', 'SupportTicketController@get')->name('get')->middleware('permission:Support Ticket-read');
            Route::get('support-ticket-detail/{id}', 'SupportTicketController@getDetails')->name('details.get')->middleware('permission:Support Ticket-read');
            Route::post('send', 'SupportTicketController@store')->name('send')->middleware('permission:Support Ticket-update');
            Route::get('clear', 'SupportTicketController@clearAll')->name('clear')->middleware('permission:Support Ticket-delete');
        });

        Route::group([
            'prefix' => 'websetting',
            'as' => 'websetting.',
        ], function () {});

        Route::group([
            'prefix' => 'legal',
            'as' => 'legal.',
        ], function () {
            Route::any('create', 'LegalDocumentController@create')->name('create');
            Route::post('', 'LegalDocumentController@store')->name('store');
            Route::post('{legalDocument}/update', 'LegalDocumentController@update')->name('update');
            Route::delete('{legalDocument}/destroy', 'LegalDocumentController@destroy')->name('destroy');
        });

        Route::group([
            'prefix' => 'photo-gallery',
            'as' => 'photo-gallery.',
        ], function () {
            Route::get('index', 'PhotoGalleryController@index')->name('index');
            Route::get('create', 'PhotoGalleryController@create')->name('create');
            Route::post('store', 'PhotoGalleryController@store')->name('store');
            Route::get('{photoGallery}/edit', 'PhotoGalleryController@edit')->name('edit');
            Route::patch('{photoGallery}/update', 'PhotoGalleryController@update')->name('update');
        });

        Route::group([
            'prefix' => 'sub-photo-gallery',
            'as' => 'sub-photo-gallery.',
        ], function () {
            Route::get('{photoGallery}/index', 'SubPhotoGalleryController@index')->name('index');
            Route::get('{photoGallery}/create', 'SubPhotoGalleryController@create')->name('create');
            Route::post('{photoGallery}/store', 'SubPhotoGalleryController@store')->name('store');
            Route::get('{photoGallery}/show', 'SubPhotoGalleryController@show')->name('show');
            Route::get('{subPhotoGallery}/edit', 'SubPhotoGalleryController@edit')->name('edit');
            Route::patch('{subPhotoGallery}/update', 'SubPhotoGalleryController@update')->name('update');
            Route::get('{subPhotoGallery}/delete', 'SubPhotoGalleryController@delete')->name('delete');
        });

        Route::group([
            'prefix' => 'website-banner',
            'as' => 'website-banner.',
        ], function () {
            Route::any('create', 'WebsiteBannerController@create')->name('create');
            Route::post('', 'WebsiteBannerController@store')->name('store');
            Route::post('{banner}/update', 'WebsiteBannerController@update')->name('update');
            Route::delete('{banner}/destroy', 'WebsiteBannerController@destroy')->name('destroy');
        });

        Route::group([
            'prefix' => 'website-pop',
            'as' => 'website-pop.',
        ], function () {
            Route::any('create', 'WebsitePopupController@create')->name('create');
            Route::post('', 'WebsitePopupController@store')->name('store');
            Route::post('{popup}/update', 'WebsitePopupController@update')->name('update');
            Route::delete('{popup}/destroy', 'WebsitePopupController@destroy')->name('destroy');
        });

        Route::group([
            'prefix' => 'settings',
            'as' => 'settings.',
        ], function () {
            Route::get('', 'SettingsController@index')->name('index');
            Route::patch('update', 'SettingsController@update')->name('update');
            Route::get('content', 'SettingsController@content')->name('content');
            Route::post('about-us', 'SettingsController@about')->name('about-us');
            Route::post('terms', 'SettingsController@terms')->name('terms');
            Route::post('privacy', 'SettingsController@privacyPolicy')->name('privacy');
            Route::post('vision-mission', 'SettingsController@visionMission')->name('vision-mission');
            Route::post('founder-message', 'SettingsController@founderMessage')->name('founder-message');
            Route::any('contact-info', 'SettingsController@contactInfo')->name('contact-info');
            Route::any('change-logo', 'SettingsController@changeLogo')->name('change-logo');
            Route::any('change-background', 'SettingsController@changeBackground')->name('change-background');
            Route::any('features-management', 'SettingsController@featuresManagement')->name('features-management');
            Route::any('control-price', 'SettingsController@controlPrice')->name('control-price');

        });

        Route::group([
            'prefix' => 'faqs',
            'as' => 'faqs.',
        ], function () {
            Route::get('', 'FaqsController@index')->name('index');
            Route::get('create', 'FaqsController@create')->name('create');
            Route::post('store', 'FaqsController@store')->name('store');
            Route::get('{faq}/edit', 'FaqsController@edit')->name('edit');
            Route::any('{faq}/update', 'FaqsController@update')->name('update');
        });

        Route::group([
            'prefix' => 'news',
            'as' => 'news.',
        ], function () {
            Route::get('', 'NewsController@index')->name('index');
            Route::get('create', 'NewsController@create')->name('create');
            Route::post('store', 'NewsController@store')->name('store');
            Route::get('{news}/edit', 'NewsController@edit')->name('edit');
            Route::post('{news}/update', 'NewsController@update')->name('update');
        });

        Route::group([
            'prefix' => 'white-paper',
            'as' => 'white-paper.',
        ], function () {
            Route::any('', 'WhitePaperController@show')->name('show');
        });

        Route::group([
            'prefix' => 'app-settings',
            'as' => 'app-settings.',
        ], function () {
            Route::get('', 'AppSettingsController@show')->name('show');
            Route::post('update', 'AppSettingsController@appSettingUpdate')->name('update');
            Route::post('apk-upload', 'AppSettingsController@apkUpload')->name('apk-upload');
        });

        Route::group([
            'prefix' => 'bank-transfer-requests',
            'as' => 'bank-transfer-requests.',
            // Add any necessary admin middleware here, e.g., 'auth:admin', 'permission:manage bank transfers'
        ], function () {
            Route::get('/', [App\Http\Controllers\Admin\BankTransferRequestController::class, 'index'])->name('index');
            Route::get('{bankTransferRequest}', [App\Http\Controllers\Admin\BankTransferRequestController::class, 'show'])->name('show');
            Route::post('{bankTransferRequest}/approve', [App\Http\Controllers\Admin\BankTransferRequestController::class, 'approve'])->name('approve');
            Route::post('{bankTransferRequest}/reject', [App\Http\Controllers\Admin\BankTransferRequestController::class, 'reject'])->name('reject');
            // Route for uploading payment proof upon approval (optional, could be part of approve)
            // Route::post('{bankTransferRequest}/upload-proof', [App\Http\Controllers\Admin\BankTransferRequestController::class, 'uploadProof'])->name('upload-proof');
        });

    });
});
