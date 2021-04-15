@extends('template.master')
@section('title', 'Introduction')

@section('css_after')
    <link rel="stylesheet" href="{{ asset('/styles/introduction-style.css') }}" />
@endsection

@section('content')

    <section id="introduction-screen-content">

        <div id="introduction-screen-touch-area">

            <div class="container text-center">

                <div>
                    <img id="introduction-screen-logo" class="img-fluid mt-2" src="{{ asset('assets/OperWorkshop_Logo_Red500.png') }}" alt="">
                </div>

            </div>

            <div id="introduction-screen-texts">

                <div class="step-introduction">
                    <p class="text-color-oper font-big">Selamat datang di <br> OPER Workshop</p>
                    <span class="text-muted">OPER Workshop merupakan platform <br> booking service kendaraan</span>
                </div>
                <div class="step-introduction">
                    <p class="text-color-oper font-big">Servis kendaraan <br> semakin murah</p>
                    <p class="text-muted">Anda cukup booking servis kendaraan<br> melalui smartphone / komputer desktop</p>
                </div>


                <div class="step-introduction">
                    <p class="text-color-oper font-big">Silahkan duduk manis <br> di rumah</p>
                    <p class="text-muted">Selagi motor anda diservis. Kini Anda tak perlu lagi <br> datang ke bengkel. Karena mobil Anda akan <br> diantar jemput oleh driver dari bengkel.</p>
                </div>

                <div class="step-introduction">
                    <p class="text-color-oper font-big">Pantau proses servis <br> kendaraan anda</p>
                    <p class="text-muted">Semua proses servis kendaraan dapat Anda <br> pantau melalui sistem OPER Workshop.</p>
                </div>

                <div class="step-introduction">
                    <p class="text-color-oper font-big">Kendaraan anda sudah <br> waktunya diservis?</p>
                </div> 
            </div>

            <div id="step-nails" class="step mt-3">
                <div class="step-circle active"></div>
                <div class="step-circle"></div>
                <div class="step-circle"></div>
                <div class="step-circle"></div>
                <div class="step-circle"></div>
            </div>

        </div>

        
        <div id="introduction-screen-button-div">
            <a href="/booking">
                <button 
                    id="bottom-btn" 
                    class="btn btn-next btn-oper rounded-pill px-4 py-3 my-3 text-center">
                    Halaman booking service
                </button>
            </a>
        </div>

        <br />

        <div id="introduction-screen-footer-div">
            <small>
                    Info lebih lanjut mengenai <a class="text-color-oper" href="">OPER Workshop</a>
            </small>
        </div>
    </section>

<script
    type="text/javascript"
    src="{{ asset('/scripts/intro-screen.js') }}?v={{ rand(1, 99999) }}">
</script>

@endsection
