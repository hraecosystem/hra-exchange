<!DOCTYPE html>

<html lang="en">
<head>
    <title>User Log In | {{ settings('company_name') }}</title>
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
        }
        
.auth-image {
    width: 50%;
    min-height: 100%;
    background:
        linear-gradient(45deg, rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.4)),
        url('{{ asset('images/background.png') }}');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover; /* <- use cover for full display */
    background-color: #f5f5f5;
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
        
        .social-links {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(0,0,0,0.1);
        }
        
        .social-links a {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f5f5f5;
            color: #333;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }
        
        @media (max-width: 768px) {
            .auth-content {
                flex-direction: column;
            }
            
            .auth-form, .auth-image {
                width: 100%;
            }
            
    .auth-image {
        background-size: contain;
        min-height: 200px;
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
<body>
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-content">
            <div class="auth-form">
                <div class="text-center">
                    <a href="{{ route('website.home') }}">
                        <!-- <img src="{{ settings()->getFileUrl('logo', asset(env('LOGO'))) }}" class="auth-logo" alt="Logo"> -->
<img src="{{ asset('images/logo-hra.png') }}" class="auth-logo" alt="Logo">

                    </a>
                    <h3 class="mb-4">Log In</h3>
                </div>
                
                <form action="{{ route('member.login.store') }}" method="POST">
                    @csrf
                    <div class="form-floating form-floating-outline">
                        <input id="email" class="form-control" type="text" placeholder="Enter Email ID"
                               name="email" value="{{ old('email') }}" autocomplete="off" autofocus required>
                        <label for="email" class="required">Email ID</label>
                        @foreach($errors->get('email') as $error)
                            <div class="text-danger font-weight-bold">{{ $error }}</div>
                        @endforeach
                    </div>
                    
                    <div class="form-floating form-floating-outline">
                        <input type="password" name="password" class="form-control dz-password"
                               id="new_password" placeholder="Enter Password" required>
                        <label for="new_password" class="required">Password</label>
                        <span class="show-pass eye">
                            <i class="fa-duotone fa-eye-slash"></i>
                            <i class="fa-duotone fa-eye"></i>
                        </span>
                        @foreach($errors->get('password') as $error)
                            <div class="text-danger font-weight-bold">{{ $error }}</div>
                        @endforeach
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me">
                            <label class="form-check-label" for="remember-me">
                                Remember Me
                            </label>
                        </div>
                        <a href="{{ route('member.forgot-password.create') }}" class="text-primary">
                            Forgot Password?
                        </a>
                    </div>
                    
                    <button class="btn btn-primary w-100 mb-3" type="submit">Log In</button>
                    
                    <p class="text-center">Not registered?
                        <a class="text-primary" href="{{ route('member.register.create') }}">Register</a>
                    </p>
                    
                    @if(settings('social_link'))
                        <div class="social-links text-center">
                            <h6 class="mb-3">Or Follow with us</h6>
                            @if(settings('facebook_url'))
                                <a target="_blank" href="{{ settings('facebook_url') }}" title="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif
                            @if(settings('linkedIn_url'))
                                <a target="_blank" href="{{ settings('linkedIn_url') }}" title="Linkedin">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            @endif
                            @if(settings('instagram_url'))
                                <a target="_blank" href="{{ settings('instagram_url') }}" title="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                            @if(settings('youtube_url'))
                                <a target="_blank" href="{{ settings('youtube_url') }}" title="Youtube">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            @endif
                            @if(settings('twitter_url'))
                                <a target="_blank" href="{{ settings('twitter_url') }}" title="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                            @if(settings('telegram_url'))
                                <a target="_blank" href="{{ settings('telegram_url') }}" title="Telegram">
                                    <i class="fab fa-telegram"></i>
                                </a>
                            @endif
                        </div>
                    @endif
                </form>
            </div>
            
            <div class="auth-image">
            </div>
        </div>
    </div>
</div>

<button class="scroll-to-top">
    <i class="fas fa-arrow-up"></i>
</button>

<footer style="text-align: center; padding: 1.5rem 0; background: #0f1934; color: #fff; font-size: 14px;">
    <div style="max-width: 100%; padding: 0 1rem;">
        <strong>HRA Web3</strong><br>
        Khalifa Street, Abu Dhabi, UAE<br>
        <a href="mailto:info@hra-web3.com" style="color: var(--primary); text-decoration: underline;">
            info@hra-web3.com
        </a><br>
        <span>+971 26 322 569</span>
    </div>
</footer>




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

