<!DOCTYPE html>

<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default"
      data-assets-path="assets/" data-template="horizontal-menu-template">
<head>
    <title>User Register | {{ settings('company_name') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta content="{{ settings('company_name') }}" name="description"/>
    <meta content="{{ settings('company_name') }}" name="author"/>
    <link rel="shortcut icon" href="{{ settings()->getFileUrl('favicon', asset(env('FAVICON'))) }}">
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.7.0/build/css/intlTelInput.css">--}}
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

        .select2-container--default .select2-selection--single {
            height: 3.5rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 3.5rem;
            min-height: 3.5rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 0.95rem;
        }

        .disabled-div {
            pointer-events: none;
            opacity: 0.5;
        }

        [data-theme-version="dark"] {
            background: #000;
        }

        /*.iti { width: 100%; height: 100% }*/
        /*.iti__arrow { border: none; }*/
        
        .auth-wrapper {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--primary) 0%, #2d2947 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        
        .auth-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 1200px;
            width: 100%;
        }
        
        .auth-content {
            display: flex;
            align-items: stretch;
        }
        
        .auth-form {
            padding: 3rem;
            width: 50%;
            max-height: 90vh;
            overflow-y: auto;
        }
        
        .auth-image {
            width: 50%;
            background: linear-gradient(45deg, rgba(45,41,71,0.8), rgba(45,41,71,0.9)), url('{{ settings()->getFileUrl('member_background', asset('images/coin.png')) }}');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .auth-logo {
            width: 120px;
            margin-bottom: 2rem;
        }
        
        .form-floating {
            margin-bottom: 1.5rem;
        }
        
        .btn-primary {
            background: var(--primary);
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
        }
        
        .input-group-text {
            background: transparent;
            border-color: #dee2e6;
            padding: 0;
        }
        
        .input-group-text .btn {
            padding: 0.8rem 1rem;
            font-size: 0.875rem;
            height: 100%;
            border-radius: 0 8px 8px 0;
            background: var(--primary);
            transition: all 0.3s ease;
        }
        
        .input-group-text .btn:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
        }
        
        .passwordValidator {
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: #6c757d;
        }
        
        @media (max-width: 768px) {
            .auth-content {
                flex-direction: column;
            }
            
            .auth-form, .auth-image {
                width: 100%;
            }
            
            .auth-image {
                min-height: 200px;
                order: -1;
            }
            
            .auth-form {
                max-height: none;
            }
        }
        
        .scroll-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 99;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        
        .scroll-to-top.active {
            opacity: 1;
            visibility: visible;
            bottom: 30px;
        }
        
        .scroll-to-top:hover {
            background: var(--primary-hover);
            transform: translateY(-3px);
        }
    </style>
    @yield('page-css')
</head>
<body class="vh-100">
<div id="loader"></div>
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-content">
            <div class="auth-form">
                <div class="text-center">
                    <a href="{{ route('website.home') }}">
                        <img src="{{ settings()->getFileUrl('logo', asset(env('LOGO'))) }}" class="auth-logo" alt="Logo">
                    </a>
                    <h3 class="mb-4">Register</h3>
                </div>
                
                <form action="{{ route('member.register.create') }}" method="post"
                      onsubmit="registerButton.disabled = true; return true;">
                    @csrf
                    <div class="form-floating form-floating-outline">
                        <input id="name" class="form-control" type="text" placeholder="Enter Name"
                               name="name" value="{{ old('name') }}" autocomplete="off" required>
                        <label for="name" class="required">Name</label>
                        @foreach($errors->get('name') as $error)
                            <div class="text-danger">{{ $error }}</div>
                        @endforeach
                    </div>

                    <div class="input-group mb-3">
                        <div class="form-floating form-floating-outline flex-grow-1">
                            <input id="email" class="form-control" type="text" placeholder="Enter Email ID"
                                   name="email" value="{{ old('email') }}" autocomplete="off" required>
                            <label for="email" class="required">Email ID</label>
                        </div>
                        <span class="input-group-text">
                            <button type="button" class="btn sendEmailOTP" id="sendEmailOTP">
                                Get Email OTP
                            </button>
                        </span>
                    </div>
                    @foreach($errors->get('email') as $error)
                        <div class="text-danger mb-3">{{ $error }}</div>
                    @endforeach

                    <div class="form-floating form-floating-outline">
                        <input id="email_otp" class="form-control" type="number" placeholder="Enter Email OTP"
                               onkeydown="return max_length(this,event,6)"
                               name="email_otp" value="{{ old('email_otp') }}" autocomplete="off" required>
                        <label for="email_otp" class="required">Email OTP</label>
                        @foreach($errors->get('email_otp') as $error)
                            <div class="text-danger">{{ $error }}</div>
                        @endforeach
                    </div>

                    <div class="form-floating form-floating-outline position-relative">
                        <input type="password" name="password" class="form-control dz-password textPassword"
                               id="new_password" placeholder="Enter Password" required>
                        <label for="new_password" class="required">Password</label>
                        <span class="show-pass eye">
                            <i class="fa-duotone fa-eye-slash"></i>
                            <i class="fa-duotone fa-eye"></i>
                        </span>
                        <div class="passwordValidator" style="display:none"></div>
                        @foreach($errors->get('password') as $error)
                            <div class="text-danger">{{ $error }}</div>
                        @endforeach
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="remember-me" required>
                        <label class="form-check-label" for="remember-me">
                            I agree to the
                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                                Terms & Conditions
                            </a>
                        </label>
                    </div>

                    <button class="btn btn-primary w-100 mb-3" type="submit" name="registerButton">
                        Register
                    </button>

                    <p class="text-center">
                        <span>Back to </span>
                        <a href="{{ route('member.login.create') }}" class="text-primary">
                            Log In
                        </a>
                    </p>
                </form>
            </div>
            
            <div class="auth-image">
                <img src="{{ settings()->getFileUrl('logo', asset(env('LOGO'))) }}" 
                     alt="Brand" 
                     style="width: 180px; filter: brightness(0) invert(1);">
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Terms & Conditions</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(settings('terms'))
                    {!! settings('terms') !!}
                @endif
            </div>
        </div>
    </div>
</div>

@routes
<script src="{{ asset('member-assets/js/global.min.js') }}"></script>
<script src="{{ asset('member-assets/js/deznav-init.js') }}"></script>
<script src="{{ asset('member-assets/js/custom.js') }}"></script>
{{--<script src="{{ asset('js/password-validator.js') }}"></script>--}}
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
{{--<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.7.0/build/js/intlTelInput.min.js"></script>--}}
<script>
    // const input = document.querySelector(

    function getEmailOTP(email, name) {
        $('#registerForm').addClass('disabled-div')

        $.ajax({
            url: "{{ route('member.send-email-otp') }}",
            method: 'post',
            data: {
                email: email,
                name: name,
                '_token': "{{ csrf_token()}}",
            },
            success: function (data) {
                $('#registerForm').removeClass('disabled-div')
                if (data.status === true) {
                    Swal.fire('Yay!!!', data.message, 'success');
                } else {
                    Swal.fire('Oops!!!', data.message, 'error');
                }
            },
            error: function (xhr, status, error) {
                $('#registerForm').removeClass('disabled-div')
                if (xhr.status == 422) {
                    var errors = xhr.responseJSON.errors
                    Swal.fire('Oops!!!', errors.email[0], 'error');
                    // Handle validation errors
                } else {
                    Swal.fire('Oops!!!', data.message, 'error');
                    // Handle other errors
                }
            }
        });
    }

    $('.sendEmailOTP').click(function () {
        if ($('#name').val().length < 1) {
            Swal.fire('Oops!!!', 'The Name is required', 'error')
        } else if ($('#email').val().length < 1) {
            Swal.fire('Oops!!!', 'The Email ID is required', 'error')
        } else {
            getEmailOTP($('#email').val().trim(), $('#name').val().trim());
        }
    });

    // $('.sendMobileOTP').click(function () {
    //    console.dir(iti.isValidNumber());
    //    console.log(iti.getValidationError());
    // });
</script>

<button class="scroll-to-top">
    <i class="fas fa-arrow-up"></i>
</button>

<script>
    // Scroll to top functionality
    const scrollToTopBtn = document.querySelector('.scroll-to-top');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 200) {
            scrollToTopBtn.classList.add('active');
        } else {
            scrollToTopBtn.classList.remove('active');
        }
    });
    
    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
</body>
</html>
