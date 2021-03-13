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
                    <p class="step-text text-color-oper">INFORMASI <br> BENGKEL</p>
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

            <div id="workshop-list"></div>

            <div class="row d-flex justify-content-between align-content-center mx-3 mb-4 mt-3">
                
                <div>
                    <button class="btn-prevnext btn-prev">
                        <i class="fa fa-arrow-left"></i>
                    </button>
                </div>


                <button  id="booking-btn" onclick="bookingOrder();" type="button" class="btn btn-oper py-2 rounded-pill w-100">BOOKING</button>
            </div>
        </div>
    </div>

</div>