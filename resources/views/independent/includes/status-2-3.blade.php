<div id="service_advisor"  class="content_area ">
    <div class="div_wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                  <h6 class="heading normal_font">SERVICE ADVISOR</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="full_round relative_pos box_circle circle2 bott_margin_1 zoomable" data-src="{{ $data->service_advisor->image_url ?? "" }}">
                        <img src="{{ $data->service_advisor->image_url ?? "" }}" alt="Foto Admin">
                    </div>
                </div>
                <div class="col-8 no_left_padd top_padd double_right_padd">
                    <div class="relative_pos">
                        <p class="bold_font">Nama : {{ $data->service_advisor->username ?? "Tidak tersedia" }} <br />
                            Telepon : {{ $data->service_advisor->phone ?? "Telepon tidak tersedia" }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 bott_padd">
                    <a 
                        href="whatsapp://send?phone=@isset($data->service_advisor->phone) {{ "+62".substr($data->service_advisor->phone, 1, strlen($data->service_advisor->phone)) }} @else "Telepon tidak tersedia" @endisset&text=Halo saya pemilik kendaraan {{ $data->vehicle_name }} dengan nomor polisi : {{ $data->vehicle_plat }} dan kode booking : {{ $data->booking_no }} , Apakah bapak bisa saya hubungi ? " 
                        class="text-center btn_green_custom bold_font">
                        
                        <i class="fa fa-video-camera" data-unicode="f03d"></i> 
                        <span class="h6">Konsultasi dengan SA</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>