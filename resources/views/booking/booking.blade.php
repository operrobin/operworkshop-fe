@extends('template.master')
@section('title', 'Booking')
@section('css_after')
    <style>
        /**
         * Kuantitas dulu deh baru kualitas. 
         */
        #workshop-list{
            max-height: 300px !important;
            overflow: scroll !important;
        }

    </style>

    <link rel="stylesheet" href="{{ asset('/styles/booking.css') }}" type="text/css" />
@endsection
@section('content')

{{--
    DOM PURPOSE
    --}}

<input type="hidden" id="brand_id" />
<input type="hidden" id="bengkel_type" value="1" />
<input type="hidden" id="vehicle_type" value="1" />

@include('booking/slide/slide-1')
@include('booking/slide/slide-2')
@include('booking/slide/slide-3')

@include('booking/location-prompt')
@include('booking/booking-error')
@include('booking/booking-resume')
@include('booking/booking-is-already-exists')

<input type="hidden" id="vehicle-brand-full" />

<script 
    src="{{ asset('/scripts/script.js') }}">
</script>

{{-- Services --}}
<script
    src="{{ mix('/js/services.js') }}"
    type="text/javascript">
</script>

<script type="text/javascript"
    src="{{ asset('/scripts/booking.js') }}">
</script>

<script type="text/javascript"
    src="{{ asset('/scripts/view-model/booking-view-model.js') }}?version=1">
</script>

<script 
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_APP_KEY') }}&libraries=places&callback=initMap" async defer>
</script>

<script type="text/javascript">
    loadInformasiPengguna("{{ Session::get('customer_phone') }}");
    loadMasterBrands();
</script>

{{-- Cukx Validate --}}
<script
    src="{{ asset('/library/cukx-validate.min.js') }}" 
    type="text/javascript">
</script>
@endsection