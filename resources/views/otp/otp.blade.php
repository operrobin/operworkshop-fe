@extends('template.master')
@section('title', 'OTP')
@section('content')

{{-- STEP 1 --}}

    <section class="content">
        <div class="container text-center">
            <div class="position-bottom px-4 mb-2">
                <div class="card shadow py-4">
                    <p>NOMOR HANDPHONE</p>


                    <div class="input-group  mb-3 mt-5 px-3">
                        <div class="input-group-prepen  border-bottom">
                            <span class="input-group-text phone-code border-0  bg-white" id="basic-addon1">+62</span>
                        </div>
                        <input 
                            required 
                            minlength="9" 
                            maxlength="15" 
                            type="text" 
                            class="form-control phone-input input-number-only" 
                            autofocus 
                            aria-label="Username"
                            aria-describedby="basic-addon1"
                            id="otp-phone-input" />
                    </div>
                </div>

                <button 
                    onclick="sendOTP();" 
                    class="btn btn-next mb-3 w-100 rounded-pill btn-oper mt-5">
                    Selanjutnya
                </button>

                <a href="">
                    <small class="text-muted">Syarat & Ketentuan OPER Workshop baca di sini</small>
                    </a>
            </div>
        </div>
    </section>

{{-- STEP 2 --}}

    <section class="content">
        <div class="container text-center">
            <div class="position-bottom px-4 mb-2">
                <div class="card shadow py-4">
                    <p>KODE OTP</p>


                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form class="text-center">
                                    <div class="form-group">
                                        <label for="password" class="text-white">Enter 4 Digit Password</label>
                                        <div class="passcode-wrapper">
                                            <input id="codeBox1" type="number" class="input-number-only" autofocus maxlength="1" onkeyup="onKeyUpEvent(1, event)"
                                                onfocus="onFocusEvent(1)">
                                            <input id="codeBox2" type="number" class="input-number-only" maxlength="1" onkeyup="onKeyUpEvent(2, event)"
                                                onfocus="onFocusEvent(2)">
                                            <input id="codeBox3" type="number" class="input-number-only" maxlength="1" onkeyup="onKeyUpEvent(3, event)"
                                                onfocus="onFocusEvent(3)">
                                            <input id="codeBox4" type="number" class="input-number-only" maxlength="1" onkeyup="onKeyUpEvent(4, event)"
                                                onfocus="onFocusEvent(4)">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div id="error-message" class="row d-none justify-content-center">
                            <p class="text-color-oper">
                                OTP Salah. Silahkan coba kembali.
                            </p>
                        </div>
                    </div>

                    
                </div>

                <button onclick="login();" class="btn mb-3 w-100 rounded-pill btn-oper mt-5">konfirmasi</button>

                <a href="">
                    <small class="text-muted">Syarat & Ketentuan OPER Workshop baca di sini</small>
                    </a>
            </div>
        </div>
    </section>



{{-- Services --}}
<script
    src="{{ mix('/js/services.js') }}"
    type="text/javascript">
</script>

{{-- Page Logic --}}
<script 
    type="text/javascript"
    src="{{ asset('/scripts/otp.js') }}">
</script>

<script 
    type="text/javascript"
    src="{{ asset('/scripts/script.js') }}">
</script>

{{-- Cukx Validate --}}
<script
    src="{{ asset('/library/cukx-validate.min.js') }}" 
    type="text/javascript">
</script>

@endsection
