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

{{-- STEP 1 - INFORMASI PENGGUNA --}}

    <div class="content">
        <div class="d-flex">
            <div class="flex-fill steps p-1 py-3 bg-light border step-active">
                <div class="d-flex align-items-center">
                    <div class="step-form">1</div>
                    <p class="step-text">INFORMASI <br> PENGGUNA</p>
                </div>
            </div>
            <div class="flex-fill steps p-1 py-3 bg-light border">
                <div class="d-flex align-items-center">
                    <div class="step-form">2</div>
                    <p class="step-text">INFORMASI <br> KENDARAAN</p>
                </div>
            </div>
            <div class="flex-fill steps py-3 bg-light border">
                <div class="d-flex align-items-center">
                    <div class="step-form">3</div>
                    <p class="step-text">INFORMASI <br> BENGKEL</p>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="form-group">
                <label for="" class="text-muted">NAME</label>
                <input id="informasi-pengguna-name-textbox" type="text" class="form-control form-border cant-pre-space">
            </div>
            
            <div class="form-group">
                <label for="" class="text-muted mt-4">PHONE NUMBER</label>
                <div class="input-group  mb-3">
                    
                    <div class="input-group-prepen ">
                        <span class="input-group-text border-0  bg-white" id="basic-addon1">+62</span>
                    </div>
                    <input id="informasi-pengguna-phone-textbox" type="text" class="form-control form-border input-number-only" autofocus aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
    
            <div class="form-group">
                <label for="" class="text-muted mt-4">EMAIL</label>
                <input id="informasi-pengguna-email-textbox" type="text" class="form-control form-border cant-space">
            </div>
    
            <button id="informasi-pengguna-next-button" type="button" class="btn btn-next btn-oper mt-5 rounded-pill w-100" disabled>Selanjutnya</button>
        </div>
    </div>
{{-- STEP 2 - INFORMASI KENDARAAN --}}

    <div class="content">
        <div class="">
            <div class="d-flex">
                <div class="flex-fill steps p-1 py-3 bg-light border ">
                    <div class="d-flex align-items-center">
                        <div class="step-form">1</div>
                        <p class="step-text">INFORMASI <br> PENGGUNA</p>
                    </div>
                </div>
                <div class="flex-fill steps p-1 py-3 bg-light border step-active">
                    <div class="d-flex align-items-center">
                        <div class="step-form">2</div>
                        <p class="step-text">INFORMASI <br> KENDARAAN</p>
                    </div>
                </div>
                <div class="flex-fill steps py-3 bg-light border">
                    <div class="d-flex align-items-center">
                        <div class="step-form">3</div>
                        <p class="step-text">INFORMASI <br> BENGKEL</p>
                    </div>
                </div>
            </div>
            <div class="container">
            <div class="form-group">
                <label for="" class="text-muted mt-4">JENIS KENDARAAN</label>
                <div class="switch-field">
                    <input type="radio" id="switch_left" checked name="informasi-kendaraan-type-radio" value="1" checked="checked" />
                    <label for="switch_left">MOBIL</label>
                    <input type="radio" disabled id="switch_right" name="informasi-kendaraan-type-radio" value="2" />
                    <label for="switch_right">MOTOR</label>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="text-muted mt-4">MERK KENDARAAN</label>
                <div id="informasi-kendaraan-brand-list" class="switch-field merk">
                    <input type="radio" id="switch_left" name="switch_2" value="yes" checked />
                    <label class="non-radius" for="switch_left">MOBIL</label>

                    <input type="radio" id="switch_right" name="switch_2" value="no" />
                    <label class="non-radius" for="switch_right">MOTOR</label>

                    <input type="radio" id="switch_right" name="switch_2" value="no" />
                    <label class="non-radius" for="switch_right">MOTOR</label>

                    <input type="radio" id="switch_right" name="switch_2" value="no" />
                    <label class="non-radius" for="switch_right">MOTOR</label>

                    <input type="radio" id="switch_right" name="switch_2" value="no" />
                    <label class="non-radius" for="switch_right">MOTOR</label>
                    <input type="radio" id="switch_right" name="switch_2" value="no" />
                    <label class="non-radius" for="switch_right">MOTOR</label>

                    <input type="radio" id="switch_right" name="switch_2" value="no" />
                    <label class="non-radius" for="switch_right">MOTOR</label>

                    <input type="radio" id="switch_right" name="switch_2" value="no" />
                    <label class="non-radius" for="switch_right">MOTOR</label>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="text-muted mt-4">TIPE KENDARAAN</label>
                <input type="text" id="informasi-kendaraan-tipe-kendaraan" class="form-control form-border cant-pre-space">
            </div>
            <div class="form-group">
                <label for="" class="text-muted mt-4">NOMOR POLISI</label>
                <input type="text" id="informasi-kendaraan-nomor-polisi" class="form-control form-border cant-pre-space">
            </div>

            <button type="button" id="informasi-kendaraan-next-button" disabled class="btn btn-next mb-4 btn-oper mt-5 rounded-pill w-100">Selanjutnya</button>
            </div>
        </div>

    </div>


{{-- STEP 3 - INFORMASI BENGKEL --}}
    <div class="content">
        <div class="">
            <div class="d-flex">
                <div class="flex-fill steps p-1 py-3 bg-light border ">
                    <div class="d-flex align-items-center">
                        <div class="step-form">1</div>
                        <p class="step-text">INFORMASI <br> PENGGUNA</p>
                    </div>
                </div>
                <div class="flex-fill steps p-1 py-3 bg-light border ">
                    <div class="d-flex align-items-center">
                        <div class="step-form">2</div>
                        <p class="step-text">INFORMASI <br> KENDARAAN</p>
                    </div>
                </div>
                <div class="flex-fill steps py-3 bg-light border step-active">
                    <div class="d-flex align-items-center">
                        <div class="step-form">3</div>
                        <p class="step-text">INFORMASI <br> BENGKEL</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="form-group">
                    <label for="" class="text-muted mt-4">PILIH BENGKEL</label>
                    <div class="switch-field">
                        <input type="radio" id="official_workshop" name="informasi-bengkel-type-radio" value="1" checked />
                        <label for="official_workshop">BENGKEL RESMI</label>
                        <input type="radio" id="open_workshop" name="informasi-bengkel-type-radio" value="2" />
                        <label for="open_workshop">BENGKEL UMUM</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="text-muted mt-4">ALAMAT</label>
                    <input type="text" id="informasi-bengkel-customer-address-textbox" class="form-control form-border cant-pre-space">
                </div>

                <div id="maps-warning" class="d-none row justify-content-center mb-3">
                    <div>
                        <button id="show-maps-instruction-btn" class="btn btn-oper">
                            Lokasi anda tidak terhubung. Silahkan mengizinkan akses lokasi untuk menggunakan fitur ini.
                        </button>
                    </div>
                </div>

                <div id="show_maps" style="width: 100%;height:300px;"></div>

                <div class="form-group">
                    <label for="" class="text-muted mt-4">WAKTU BOOKING</label>

                    <div class="row">
                        <div class="col-6">
                            <input type="date" min="today" id="informasi-bengkel-booking-date-datecontrol" class="form-control form-border cant-pre-space">
                            
                        </div>
                        <div class="col-6">
                            <input type="time" id="informasi-bengkel-booking-time-datecontrol" class="form-control form-border cant-pre-space">
    
                        </div>
                    </div>
                </div>


                <p class="text-muted mt-4">LOKASI BENGKEL</p>

                <div id="workshop-list">
                   
                </div>

                <button onclick="bookingOrder();" type="button" class="btn mb-4 btn-oper mt-3 py-2 rounded-pill w-100">BOOKING</button>
            </div>
        </div>

    </div>

@include('booking/location-prompt')
@include('booking/booking-error')
@include('booking/booking-resume')

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
    src="{{ asset('/scripts/view-model/booking-view-model.js') }}">
</script>

<script 
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_APP_KEY') }}&callback=initMap" async defer>
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