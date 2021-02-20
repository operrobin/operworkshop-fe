@extends('template.master')
@section('css_after')

    <link 
        rel="stylesheet"
        href="{{ asset('/styles/splash-screen-style.css') }}" />

@endsection
@section('content')
    <div id="logo-content">
        <img src="{{ asset('logo/logo-258.png') }}" alt="logo-image" />
    </div>

    <div id="workshop-content">
        <img src="{{ asset('/assets/logo_operworkshop_putih.png') }}" alt="logo-image" />
    </div>

    <script
        type="text/javascript"
        src="{{ asset('/scripts/splash-screen.js') }}">
    </script>
@endsection