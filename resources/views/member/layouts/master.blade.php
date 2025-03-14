<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') | {{ settings('company_name') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta content="{{ settings('company_name') }}" name="description"/>
    <meta content="{{ settings('company_name') }}" name="author"/>
    <link rel="shortcut icon" href="{{ settings()->getFileUrl('favicon', asset(env('FAVICON'))) }}">
    @stack('import-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icons.min.css') }}">
    <link href="{{ asset('member-assets/css/sweetalert2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.4/flatpickr.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/css/select2.min.css"/>
    <link type="text/css" href="{{ asset('member-assets/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('member-assets/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/datatables.bootstrap5.css') }}" rel="stylesheet">
    <link class="main-css" type="text/css" href="{{ asset('member-assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <style>
        :root {
            --primary: {{ settings('primary_color') }};
            --primary-hover: {{ settings('primary_color_hover') }};
        }
    </style>
    @stack('page-css')
</head>
<body>
<div id="loader"></div>
<div id="main-wrapper">
    @include('member.layouts.header')
    @include('member.layouts.sidebar')
    <div class="content-body">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <div class="footer out-footer">
        <div class="copyright d-lg-flex justify-content-lg-between">
            <p>
                © Copyright {{ date('Y') }}. All Rights Reserved by
                <a href="{{ env('APP_URL') }}" target="_blank">{{ settings('company_name') }}</a>
            </p>
            <p>
                Last Login :
                @if($lastLoginLog)
                    {{ $lastLoginLog->created_at->dateTimeFormat() }} from <span
                        class="text-primary">{{ $lastLoginLog->ip }}</span>
                @else
                    N/A
                @endif
            </p>
        </div>
    </div>
    @stack('import-javascript')
    @routes
    <script src="{{ asset('member-assets/js/global.min.js') }}"></script>
    <script src="{{ asset('member-assets/js/custom.js') }}"></script>
    <script src="{{ asset('member-assets/js/deznav-init.js') }}"></script>
    <script src="{{ asset('member-assets/js/demo.js') }}"></script>
    <script src="{{ asset('member-assets/js/styleSwitcher.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.4/flatpickr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/js/select2.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/spin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <script src="{{ asset('assets/js/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('member-assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('member-assets/js/datatables.init.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script>

        let headerFix = function () {
            'use strict';
            /* Main navigation fixed on top  when scroll down function custom */
            $(window).on('scroll', function () {
                if ($('.header').length > 0) {
                    var menu = jQuery('.header');
                    $(window).scroll(function () {
                        var sticky = $('.header'),
                            scroll = $(window).scrollTop();

                        if (scroll >= 10) {
                            sticky.addClass('is-fixed');
                        } else {
                            sticky.removeClass('is-fixed');
                        }
                    });
                }

            });
            /* Main navigation fixed on top  when scroll down function custom end*/
        }
    </script>
    @if(Session::has('success'))
        <script>
            Swal.fire('Yay!!!', '{{ Session::get('success') }}', 'success')
        </script>
    @endif
    @if(Session::has('success-export'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Yay!!!',
                text: '{{ Session::get('success-export') }}',
                footer: '<a href="{{ route('member.exports.index') }}" class="text-primary">Go To Exports</a>'
            });
        </script>
    @endif
    @if(Session::has('error'))
        <script>
            Swal.fire('Oops!!!', '{{ Session::get('error') }}', 'error')
        </script>
@endif
@stack('page-javascript')
</body>
</html>
