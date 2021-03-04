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
                    <!--<p class="bold_font">Dimohon untuk menunggu.<br>Driver kami dalam perjalanan menuju tempat anda.<br>Silahkan hubungi foreman kami untuk info lebih lanjut. </p>-->
                </div>
            </div>
        </div>
    </div>
    
    <div class="div_wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                
                   <h6 class="heading normal_font">DRIVER</h6>
                    <!-- <h6 class="heading normal_font">FOREMAN</h6>-->
                
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="full_round relative_pos box_circle circle2 bott_margin_1 zoomable" data-src="{{ $oper_task->driver->fotodriver ?? asset('/assets/img/driver74x74.png') }}">
                        <img src="{{ $oper_task->driver->fotodriver ?? asset('/assets/img/driver74x74.png') }}" alt="Foto Tidak Tersedia">

                    </div>
                </div>
                <div class="col-8 no_left_padd top_padd double_right_padd">
                    <div class="relative_pos">
                        <p class="bold_font">Nama : {{ $oper_task->driver->namadriver ?? "Nama Tidak Tersedia" }}
                            <br>
                            Telepon : {{ $oper_task->driver->telepon ?? "Telepon tidak tersedia" }}
                        </p>
                        <a href="tel:{{ "+62".($oper_task->driver->telepon ?? "Telepon tidak tersedia") }}" class="phone_icon"><i class="fa fa-phone h1 bigger" data-unicode="f095"></i></a>
                        
                         
                        <a href="whatsapp://send?phone={{ "+62".($oper_task->driver->telepon ?? "Telepon tidak tersedia") }}&text=Halo saya pemilik kendaraan {{ $data->vehicle_name }} dengan nomor polisi : {{ $data->vehicle_plat }} dan kode booking : {{ $data->booking_no }} , Apakah bapak bisa saya hubungi ? " class="whatsapp_icon" ><i class="fa fa-whatsapp h1 bigger" data-unicode="f232"></i>
                        
                        </a>
                    </div>

                    <input type="hidden" value="{{ $oper_task->driver->lat ?? 0.0 }}" id="latdriver" /> 
                    <input type="hidden" value="{{ $oper_task->driver->lng ?? 0.0 }}" id="longdriver" />
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
                    <a data-popup="#confirm_popup" class="text-center btn_blue_custom bold_font show_popup"><span class="h6">Selesai</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
