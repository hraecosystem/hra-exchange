<style>
    body {
        margin: 0;
    }

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
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
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
        background: linear-gradient(45deg, rgba(45, 41, 71, 0.8), rgba(45, 41, 71, 0.9)), url('{{ settings()->getFileUrl('member_background', asset('images/coin.png')) }}');
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
        color: white;
        transition: all 0.3s ease;
        width: 100%;

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

        .auth-form,
        .auth-image {
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
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
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

    .title {
        max-width: 400px;
        margin: auto;
        text-align: center;
        font-family: "Poppins", sans-serif;
    }

    .title h3 {
        font-weight: bold;
    }

    .title p {
        font-size: 12px;
        color: #118a44;
    }

    .title p.msg {
        color: initial;
        text-align: initial;
        font-weight: bold;
        text-align: center;
    }

    .otp-input-fields {
        margin: auto;
        box-shadow: 0px 0px 8px 0px #020250 44;
        max-width: 400px;
        width: auto;
        display: flex;
        justify-content: center;
        gap: 10px;
        padding: 10px;
    }

    .otp-input-fields input {
        height: 40px;
        width: 40px;
        background-color: transparent;
        border-radius: 4px;
        border: 1px solid #2f8f1f;
        text-align: center;
        outline: none;
        font-size: 16px;
        /* Firefox */
    }


    .otp-input-fields input::-webkit-outer-spin-button,
    .otp-input-fields input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }


    .otp-input-fields input[type=number] {
        -moz-appearance: textfield;
    }

    .otp-input-fields input:focus {
        border-width: 2px;
        border-color: #287a1a;
        font-size: 20px;
    }

    .result {
        /* max-width: 400px;
        margin: auto;
        padding: 24px; */
        text-align: center;
    }

    .result p {
        font-size: 24px;
        font-family: 'Antonio', sans-serif;
        opacity: 1;
        transition: color 0.5s ease;
    }

    .result p._ok {
        color: green;
    }

    .result p._notok {
        color: red;
        border-radius: 3px;
    }
</style>



<div id="loader"></div>
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-content">
            <div class="auth-form">
                <div class="text-center" style="text-align: center">
                    <a href="{{ route('website.home') }}">
                        <img src="{{ settings()->getFileUrl('logo', asset(env('LOGO'))) }}" class="auth-logo"
                            alt="Logo">
                    </a>
                    <div class="title">
                        <h3>OTP VERIFICATION</h3>
                        <p class="info">An otp has been sent to {{ $email }} </p>

                        <p class="msg ">Please enter OTP to verify</p>
                    </div>

                </div>

                <form action="{{ route('member.verification_otp.verificationOtp') }}" class="otp-form" name="otp-form"
                    method="post">
                    @csrf

                    <div class="otp-input-fields">
                        <input type="number" name="otp_1" value="otp_1" class="otp__digit otp__field__1">
                        <input type="number" name="otp_2" value="otp_2" class="otp__digit otp__field__2">
                        <input type="number" name="otp_3" value="otp_3" class="otp__digit otp__field__3">
                        <input type="number" name="otp_4" value="otp_4" class="otp__digit otp__field__4">
                        <input type="number" name="otp_5" value="otp_5" class="otp__digit otp__field__5">
                        <input type="number" name="otp_6" value="otp_6" class="otp__digit otp__field__6">
                        <input type="email" name="email" value="{{ $email }}" hidden>
                    </div>
                    @if ($errors->has('faile'))
                        <p class="danger" style="color: red;">{{ $errors->first('faile') }}</p>
                    @endif
                    <div class="result">

                        <p id="_otp" class="_notok"></p>
                    </div>
                    <button class="btn btn-primary w-100 mb-3" type="submit">Send</button>
                </form>
            </div>

            <div class="auth-image">
                <img src="{{ settings()->getFileUrl('logo', asset(env('LOGO'))) }}" alt="Brand"
                    style="width: 180px; filter: brightness(0) invert(1);">
            </div>
        </div>
    </div>
</div>

<script>
    var otp_inputs = document.querySelectorAll(".otp__digit")
    var mykey = "0123456789".split("")
    otp_inputs.forEach((_) => {
        _.addEventListener("keyup", handle_next_input)
    })

    function handle_next_input(event) {
        let current = event.target
        let index = parseInt(current.classList[1].split("__")[2])
        current.value = event.key

        if (event.keyCode == 8 && index > 1) {
            current.previousElementSibling.focus()
        }
        if (index < 6 && mykey.indexOf("" + event.key + "") != -1) {
            var next = current.nextElementSibling;
            next.focus()
        }
        var _finalKey = ""
        for (let {
                value
            }
            of otp_inputs) {
            _finalKey += value
        }
        if (_finalKey.length == 6) {
            document.querySelector("#_otp").classList.replace("_notok", "_ok")
            document.querySelector("#_otp").innerText = _finalKey
        } else {
            document.querySelector("#_otp").classList.replace("_ok", "_notok")
            document.querySelector("#_otp").innerText = _finalKey
        }
    }
</script>
