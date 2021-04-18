{{--
    /**
     * Case Dapet Driver
     */
    --}}

<div id="pengantaran" class="content_area ">
    <div class="div_wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                  <h6 class="heading normal_font">STATUS</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="full_round relative_pos box_circle circle3 bott_margin_1 ">
                        <img src="{{ asset('/assets/img/pengantaran74x74.png') }}">
                    </div>
                </div>
                <div class="col-8 top_padd">
                    <p class="bold_font">Dimohon untuk menunggu<br>Driver kami dalam perjalanan menuju tempat anda.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="div_wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                   <h6 class="heading normal_font">DRIVER</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="full_round relative_pos box_circle circle2 bott_margin_1 zoomable" data-src="{{ $oper_task->driver->user->profile_picture ?? null }}">
                        <img src="{{ env('OPERTASK_API_BASE_URL')."/storage/".substr($oper_task->driver->user->profile_picture ?? "", 6) ?? asset('/assets/img/driver74x74.png') }}" alt="Foto Tidak Tersedia">
                    </div>
                </div>
                <div class="col-8 no_left_padd top_padd double_right_padd">
                    <div class="relative_pos">
                        <p class="bold_font">Nama : {{ $oper_task->driver->user->name ?? "Nama Tidak Tersedia" }}
                            <br>
                            Telepon : {{ $oper_task->driver->user->phonenumber ?? "Telepon tidak tersedia" }}
                        </p>
                        <a href="tel:{{ ($oper_task->driver->user->phonenumber ?? "Telepon tidak tersedia") }}" class="phone_icon"><i class="fa fa-phone h1 bigger" data-unicode="f095"></i></a>
                        
                         
                        <a href="whatsapp://send?phone=@isset($oper_task->driver->user->phonenumber) {{ "+62".substr($oper_task->driver->user->phonenumber, 1, strlen($oper_task->driver->user->phonenumber)) }} @else "Telepon tidak tersedia" @endisset&text=Halo saya pemilik kendaraan {{ $data->vehicle_name }} dengan nomor polisi : {{ $data->vehicle_plat }} dan kode booking : {{ $data->booking_no }} , Apakah bapak bisa saya hubungi ? " class="whatsapp_icon" ><i class="fa fa-whatsapp h1 bigger" data-unicode="f232"></i>
                        
                        </a>
                    </div>

                    <input type="hidden" value="{{ $oper_task->driver->user->attendance_latitude ?? $data->workshop->bengkel_lat }}" id="latdriver" /> 
                    <input type="hidden" value="{{ $oper_task->driver->user->attendance_longitude ?? $data->workshop->bengkel_long }}" id="longdriver" />
                    <input type="hidden" value="{{ $data->workshop->bengkel_alamat }}" id="lokasibooking"> 
                    <input type="hidden" value="{{ $data->booking_time }}" id="waktubooking"> 
                </div>
            </div>
            <div class="row">
                <div class="col-12 no_left_padd no_right_padd">
                    <div id="map_box"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="div_wrapper no_background">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a id="selesai-btn" data-popup="#confirm_popup" class="text-center btn_blue_custom bold_font show_popup"><span class="h6">Selesai</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
