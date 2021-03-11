{{-- STEP 1 - INFORMASI PENGGUNA --}}

<div class="content">
    <div class="d-flex">
        <div class="flex-fill steps p-1 py-3 bg-light border step-active">
            <div class="d-flex align-items-center">
                <div class="step-form">1</div>
                <p class="step-text text-color-oper">INFORMASI <br> PENGGUNA</p>
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


        <div class="row d-flex justify-content-end mx-3">
            <button disabled id="informasi-pengguna-next-button" onclick="checkCurrentBooking(this);" class="btn-prevnext">
                <i class="fa fa-arrow-right"></i>
            </button>
        </div>
    </div>
</div>