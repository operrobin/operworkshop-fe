<div class="div_wrapper">
    <div class="container">
        <div class="row">
            <div class="col">
              <h6 class="heading normal_font">STATUS</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="full_round relative_pos box_circle circle3 bott_margin_1" >
                    <img src="img/service74x74.png">
                </div>
            </div>
            <div class="col-8 top_padd">
                <p class="bold_font">Kendaraan anda telah selesai dikerjakan. Silahkan melakukan pembayaran dengan menghubungi service advisor terkait.</p>
            </div>
        </div>
    </div>
</div>


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
                    <div class="full_round relative_pos box_circle circle2 bott_margin_1 zoomable" data-src="{{ $data->service_advisor->image_url }}">
                        <img src="{{ $data->service_advisor->image_url }}" alt="Foto Admin">
                    </div>
                </div>
                <div class="col-8 no_left_padd top_padd double_right_padd">
                    <div class="relative_pos">
                        <p class="bold_font">Nama : {{ $data->service_advisor->username }} <br />
                            Telepon : {{ $data->service_advisor->phone }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 bott_padd">
                    <a 
                        href="whatsapp://send?phone={{ $data->service_advisor->phone }}&text=Halo saya pemilik kendaraan {{ $data->vehicle_name }} dengan nomor polisi : {{ $data->vehicle_plat }} dan kode booking : {{ $data->booking_no }} , Apakah bapak bisa saya hubungi terkait pembayaran service saya ? " 
                        class="text-center btn_green_custom bold_font">
                        
                        <i class="fa fa-video-camera" data-unicode="f03d"></i> 
                        <span class="h6">Konsultasi dengan SA</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>