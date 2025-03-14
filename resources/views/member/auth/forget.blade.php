<!DOCTYPE html>

<html lang="en">
<head>
    <title>User Reset Password | {{ settings('company_name') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta content="{{ settings('company_name') }}" name="description"/>
    <meta content="{{ settings('company_name') }}" name="author"/>
    <link rel="shortcut icon" href="{{ settings()->getFileUrl('favicon', asset(env('FAVICON'))) }}">
    @yield('import-css')
    <link href="{{ asset('member-assets/css/sweetalert2.min.css') }}" rel="stylesheet">
    <link class="main-css" type="text/css" href="{{ asset('member-assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icons.min.css') }}">
    <style>
        :root {
            --primary: {{ settings('primary_color') }};
            --primary-hover: {{ settings('primary_color_hover') }};
        }

        [data-theme-version="dark"] {
            background: #000;
        }
    </style>
    @yield('page-css')
</head>
<body class="vh-100">
<div class="authincation h-100">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-lg-6 col-md-12 col-sm-12 mx-auto align-self-center">
                <div class="login-form">
                    <div class="text-center">
                        <a href="{{ route('website.home') }}">
                            <img src="{{ settings()->getFileUrl('logo', asset(env('LOGO'))) }}" class="mb-3 w-25"
                                 alt="">
                        </a>
                        <h3 class="title">Reset Password?</h3>
                        <p>Enter your Email ID, and we will send you a new password</p>
                    </div>
                    <form id="formAuthentication" class="mb-3" action="{{ route('member.forgot-password.store') }}"
                          method="POST" onsubmit="submit.disabled = true; return true;">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="form-floating form-floating-outline">
                                <input id="email" class="form-control" type="text" placeholder="Enter Email ID"
                                       name="email" value="{{ old('email') }}" autocomplete="off" required>
                                <label for="email" class="required">Email ID</label>
                            </div>
                            @foreach($errors->get('email') as $error)
                                <div class="text-danger font-weight-bold">{{ $error }}</div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit" name="submit">
                                Reset Password
                            </button>
                        </div>
                    </form>

                    <h6 class="login-title mb-3"><span>Or</span></h6>

                    <p class="text-center">
                        <span>Back to </span>
                        <a href="{{ route('member.login.create') }}">
                            <span>Log In</span>
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 text-center">
                <img class="img-fluid"
                     src="{{ settings()->getFileUrl('member_background', asset('images/coin.png')) }}"
                     alt="">
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('member-assets/js/global.min.js') }}"></script>
<script src="{{ asset('member-assets/js/deznav-init.js') }}"></script>
<script src="{{ asset('member-assets/js/demo.js') }}"></script>
<script src="{{ asset('member-assets/js/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/spin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.js"></script>
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
</body>
</html>
