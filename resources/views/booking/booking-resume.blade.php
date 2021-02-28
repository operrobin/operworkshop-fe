<div class="modal fade" id="resume-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-dialog-scrollable">
            <div class="modal-header border-0">
                <h5 class="modal-title font-weight-normal text-muted" id="exampleModalLabel">Ringkasan Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            
            </div>
            <div class="modal-body mx-3">

                <span class="text-muted form-title">
                        <span>①</span>  Informasi Pengguna
                </span>

                <div class="container mt-2">

                    <div class="form-group">
                        <label for="resume-customer-fullname" class="text-muted form-title">NAMA</label>
                        <span id="resume-customer-fullname" class="text-uppercase form-value">Yosua Kristianto</span>
                    </div>

                    <div class="form-group">
                        <label for="resume-customer-fullname" class="text-muted form-title">NOMOR TELEPON</label>
                        <span id="resume-customer-phone" class="text-uppercase form-value">081210315286</span>
                    </div>

                    <div class="form-group">
                        <label for="resume-customer-fullname" class="text-muted form-title">EMAIL</label>
                        <span id="resume-customer-email" class="text-uppercase form-value">nyanya@gmail.com</span>
                    </div>
                </div>
                
                <span class="text-muted form-title">
                    <span>②</span>   Informasi Kendaraan
                </span>

                <div class="container mt-2">

                    <div class="form-group">
                        <label for="resume-customer-fullname" class="text-muted form-title">JENIS KENDARAAN</label>
                        <span id="resume-vehicle-vehicle-type" class="text-uppercase form-value">MOBIL</span>
                    </div>

                    <div class="form-group">
                        <label for="resume-customer-fullname" class="text-muted form-title">MERK MOBIL</label>
                        <span id="resume-vehicle-vehicle-brand" class="text-uppercase form-value">HONDA</span>
                    </div>

                    <div class="form-group">
                        <label for="resume-customer-fullname" class="text-muted form-title">TIPE KENDARAAN</label>
                        <span id="resume-vehicle-fullname" class="text-uppercase form-value">CIVIC</span>
                    </div>

                    <div class="form-group">
                        <label for="resume-customer-fullname" class="text-muted form-title">NOMOR POLISI</label>
                        <span id="resume-vehicle-plate" class="text-uppercase form-value">B 1234 AS</span>
                    </div>
                </div>

                <span class="text-muted form-title">
                    <span>③</span>  Informasi Bengkel
                </span>

                <div class="container mt-2">

                    <div class="form-group">
                        <label for="resume-customer-fullname" class="text-muted form-title">Bengkel</label>
                        <span id="resume-workshop-name" class="text-uppercase form-value">MAGELANG MOTOR JAYA</span>
                    </div>

                    <div class="form-group">
                        <label for="resume-customer-fullname" class="text-muted form-title">WAKTU BOOKING</label>
                        <span id="resume-order-time" class="text-uppercase form-value">10/11/2021 17:11</span>
                    </div>

                    <div class="form-group">
                        <label for="resume-customer-fullname" class="text-muted form-title">ALAMAT PENJEMPUTAN</label>
                        <span id="resume-order-address" class="text-uppercase form-value">Di rumah gue</span>
                    </div>
                </div>
            </div>

            <div class="container mt-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="agreement">
                    <label class="custom-control-label agreement-check-title" for="agreement">Saya menyetujui syarat & ketentuan OPER Workshop</label>
                </div>
                
                <button disabled onclick="createBooking();" id="booking-trigger-btn" type="button" class="btn mb-4 btn-oper mt-3 py-2 rounded-pill w-100">BOOKING</button>            
            </div>

        </div>
    </div>
</div>