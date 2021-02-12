@extends('template.master')
@section('css_after')

    <link 
        rel="stylesheet"
        href="{{ asset('/styles/splash-screen-style.css') }}" />

@endsection
@section('content')
    <div id="content">
        <img src="{{ asset('logo/logo-258.png') }}" />
    </div>

    <script
        type="text/javascript"
        src="{{ asset('/scripts/splash-screen.js') }}">
    </script>
@endsection