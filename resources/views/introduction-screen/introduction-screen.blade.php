@extends('template.master')
@section('title', 'Introduction')
@section('content')
{{-- STEP 1 --}}

    <section class="content">
        <div class="container text-center">

            <div class="">
                <img class="img-fluid mt-2" style="height: 40px;"  src="{{ asset('assets/OperWorkshop_Logo_Red500.png') }}" alt="">
            </div>
            <div class="position-bottom">
                <p class="text-color-oper font-big">Selamat datang di <br> OPER Workshop</p>
                <p class="text-muted">OPER Workshop merupakan platform <br> booking service kendaraan</p>

                <div class="step mt-3">
                    <div class="step-circle active"></div>
                    <div class="step-circle"></div>
                    <div class="step-circle"></div>
                    <div class="step-circle"></div>
                    <div class="step-circle"></div>
                </div>

                <button class="btn btn-next btn-oper rounded-pill px-4 py-3 my-3">Halaman booking service</button><br>

                <small>Info lebih lanjut mengenai <a class="text-color-oper" href="">OPER Workshop</a></small>
            </div>
        </div>
    </section>

{{-- STEP 2 --}}

    <section class="content">
        <div class="container text-center">

            <div class="">
                <img class="img-fluid mt-2" style="height: 40px;" src="{{ asset('assets/OperWorkshop_Logo_Red500.png') }}" alt="">
            </div>
            <div class="position-bottom">
                <p class="text-color-oper font-big">Servis kendaraan <br> semakin murah</p>
                <p class="text-muted">Anda cukup booking servis kendaraan<br> melalui smartphone / komputer desktop</p>

                <div class="step mt-3">
                    <div class="step-circle"></div>
                    <div class="step-circle active"></div>
                    <div class="step-circle"></div>
                    <div class="step-circle"></div>
                    <div class="step-circle"></div>
                </div>

                <button class="btn btn-next btn-oper rounded-pill px-4 py-3 my-3">Halaman booking service</button><br>

                <small>Info lebih lanjut mengenai <a class="text-color-oper" href="">OPER Workshop</a></small>
            </div>
        </div>
    </section>

{{-- STEP 3 --}}

    <section class="content">
    <div class="container text-center">
        
        <div class="">
            <img class="img-fluid mt-2" style="height: 40px;" src="{{ asset('assets/OperWorkshop_Logo_Red500.png') }}" alt="">
        </div>
        <div class="position-bottom">
            <p class="text-color-oper font-big">Silahkan duduk manis <br> di rumah</p>
            <p class="text-muted">Selagi motor anda diservis. Kini Anda tak perlu lagi <br> datang ke bengkel. Karena mobil Anda akan <br> diantar jemput oleh driver dari bengkel.</p>

            <div class="step mt-3">
                <div class="step-circle"></div>
                <div class="step-circle"></div>
                <div class="step-circle active"></div>
                <div class="step-circle"></div>
                <div class="step-circle"></div>
            </div>

            <button class="btn btn-next btn-oper rounded-pill px-4 py-3 my-3">Halaman booking service</button><br>

            <small>Info lebih lanjut mengenai <a class="text-color-oper" href="">OPER Workshop</a></small>
        </div>
    </div>
    </section>

{{-- STEP 4 --}}

    <section class="content">
    <div class="container text-center">
        
        <div class="">
            <img class="img-fluid mt-2" style="height: 40px;" src="{{ asset('assets/OperWorkshop_Logo_Red500.png') }}" alt="">
        </div>
        <div class="position-bottom">
            <p class="text-color-oper font-big">Pantau proses servis <br> kendaraan anda</p>
            <p class="text-muted">Semua proses servis kendaraan dapat Anda <br> pantau melalui sistem OPER Workshop.</p>

            <div class="step mt-3">
                <div class="step-circle"></div>
                <div class="step-circle"></div>
                <div class="step-circle"></div>
                <div class="step-circle active"></div>
                <div class="step-circle"></div>
            </div>

            <button class="btn btn-next btn-oper rounded-pill px-4 py-3 my-3">Halaman booking service</button><br>

            <small>Info lebih lanjut mengenai <a class="text-color-oper" href="">OPER Workshop</a></small>
        </div>
    </div>
    </section>

{{-- STEP 5 --}}

    <section class="content">
    <div class="container text-center">
        
        <div class="">
            <img class="img-fluid mt-2" style="height: 40px;" src="{{ asset('assets/OperWorkshop_Logo_Red500.png') }}" alt="">
        </div>
        <div class="position-bottom">
            <p class="text-color-oper font-big">Pantau proses servis <br> kendaraan anda</p>
            <p class="text-muted">Semua proses servis kendaraan dapat Anda <br> pantau melalui sistem OPER Workshop.</p>

            <div class="step mt-3">
                <div class="step-circle"></div>
                <div class="step-circle"></div>
                <div class="step-circle"></div>
                <div class="step-circle active"></div>
                <div class="step-circle"></div>
            </div>

            <button class="btn btn-next btn-oper rounded-pill px-4 py-3 my-3">Halaman booking service</button><br>

            <small>Info lebih lanjut mengenai <a class="text-color-oper" href="">OPER Workshop</a></small>
        </div>
    </div>
    </section>
    <section class="content">
    <div class="container text-center">
        
        <div class="">
            <img class="img-fluid mt-2" style="height: 40px;" src="{{ asset('assets/OperWorkshop_Logo_Red500.png') }}" alt="">
        </div>
        <div class="position-bottom">
            <p class="text-color-oper font-big">Kendaraan anda sudah <br> waktunya diservis?</p>

            <a href="/">

            </a>
            <button class="btn btn-next btn-oper rounded-pill px-4 py-3 my-3">
                Booking servis sekarang
            </button>
            
            <br>

            <small>Info lebih lanjut mengenai <a class="text-color-oper" href="">OPER Workshop</a></small>
        </div>
    </div>
    </section>

<script
    type="text/javascript"
    src="{{ asset('/scripts/script.js') }}">
</script>

@endsection
