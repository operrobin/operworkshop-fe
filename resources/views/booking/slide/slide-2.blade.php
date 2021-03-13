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
                    <p class="step-text text-color-oper">INFORMASI <br> KENDARAAN</p>
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

            <div class="row d-flex justify-content-between mx-3">
                <button class="btn-prevnext btn-prev">
                    <i class="fa fa-arrow-left"></i>
                </button>

                <button disabled id="informasi-kendaraan-next-button" class="btn-prevnext btn-next">
                    <i class="fa fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>

</div>