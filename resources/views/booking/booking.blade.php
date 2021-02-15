@extends('template.master')
@section('title', 'Booking')
@section('content')

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
        <div class="container">
            <div class="form-group">
                <label for="" class="text-muted">NAME</label>
                <input type="text" class="form-control form-border">
            </div>
            
            <div class="form-group">
                <label for="" class="text-muted mt-4">PHONE NUMBER</label>
                <div class="input-group  mb-3">
                    
                    <div class="input-group-prepen ">
                        <span class="input-group-text border-0  bg-white" id="basic-addon1">+62</span>
                    </div>
                    <input type="text" class="form-control form-border" autofocus aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
    
            <div class="form-group">
                <label for="" class="text-muted mt-4">EMAIL</label>
                <input type="text" class="form-control form-border">
            </div>
    
            <button type="button" class="btn btn-next btn-danger mt-5 rounded-pill w-100">selanjutnya</button>
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
                    <input type="radio" id="switch_left" name="switch_2" value="yes" checked />
                    <label for="switch_left">MOBIL</label>
                    <input type="radio" id="switch_right" name="switch_2" value="no" />
                    <label for="switch_right">MOTOR</label>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="text-muted mt-4">MERK KENDARAAN</label>
                <div class="switch-field merk">
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
                <input type="text" class="form-control form-border">
            </div>
            <div class="form-group">
                <label for="" class="text-muted mt-4">NOMOR POLISI</label>
                <input type="text" class="form-control form-border">
            </div>

            <button type="button" class="btn btn-next mb-4 btn-danger mt-5 rounded-pill w-100">selanjutnya</button>
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
                    <input type="radio" id="switch_left" name="switch_2" value="yes" checked />
                    <label for="switch_left">BENGKEL RESMI</label>
                    <input type="radio" id="switch_right" name="switch_2" value="no" />
                    <label for="switch_right">BENGKEL UMUM</label>
                </div>
            </div>

            <div id="show_maps" style="width: 100%;height:300px;"></div>

            <p class="text-muted mt-4">LOKASI BENGKEL</p>

            <div class="">
                <div style="font-size: 13px;" class="row mx-1 my-2 card-review align-items-center active">
                    <div style="height: 100px; width: 100%; background-color: lightgray;" class="col-4"></div>
                    <div class="col">
                        <div class="d-flex">
                            <p class="font-weight-bold ">AUTOLUX</p>
                            <div class="review font-weight-bold text-center ml-2">
                                <i style="color: rgb(255, 217, 5);" class="fas fa-star"></i>
                                4.7
                            </div>


                        </div>
                        <p style="font-size: 10px;" class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non consectetur ullam, vel in tempora nam iusto quia dolore sunt </p>
                    </div>
                </div>
                <div style="font-size: 13px;" class="row mx-1 my-2 card-review align-items-center">
                    <div style="height: 100px; width: 100%; background-color: lightgray;" class="col-4"></div>
                    <div class="col">
                        <div class="d-flex">
                            <p class="font-weight-bold ">AUTOLUX</p>
                            <div class="review font-weight-bold text-center ml-2">
                                <i style="color: rgb(255, 217, 5);" class="fas fa-star"></i>
                                4.7
                            </div>


                        </div>
                        <p style="font-size: 10px;" class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non consectetur ullam, vel in tempora nam iusto quia dolore sunt </p>
                    </div>
                </div>
            </div>

            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn mb-4 btn-danger mt-3 py-2 rounded-pill w-100">BOOKING</button>
            </div>
        </div>

    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5 d-flex align-items-center flex-column">
                <div style="width: 130px; height: 130px; background-color: lightgray; " class="rounded-circle"></div>
                <p>Booking anda berhasil!</p>
                <p style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, velit?</p>
                <button class="btn btn-danger mt-3 rounded-pill w-100">Selesai</button>
            </div>

        </div>
    </div>
</div>

<script 
    src="{{ asset('/scripts/script.js') }}">
</script>

<script 
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_APP_KEY') }}&callback=initMap" async defer>
</script>

<script type="text/javascript"
    src="{{ asset('/scripts/booking.js') }}">
</script>
@endsection