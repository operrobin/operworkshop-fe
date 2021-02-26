/*
 |--------------------------------------------------------------------------
 | Booking View Model
 |--------------------------------------------------------------------------
 |
 | This part is used for any data related logic.
 |
 */ 

/**
 * Informasi Pengguna Part
 */
const informasi_pengguna_name_textbox = document.getElementById('informasi-pengguna-name-textbox');
const informasi_pengguna_phone_textbox = document.getElementById('informasi-pengguna-phone-textbox');
const informasi_pengguna_email_textbox = document.getElementById('informasi-pengguna-email-textbox');
const informasi_pengguna_next_button = document.getElementById('informasi-pengguna-next-button');

/**
 * On Page load
 */
function loadInformasiPengguna(phone){
  var response = new UserServices().getUserByPhone(phone);

  response.then(res => {
    console.log(res);
    if(res.data.data.customer_name != undefined){
      informasi_pengguna_name_textbox.value = res.data.data.customer_name;
      informasi_pengguna_phone_textbox.value = res.data.data.customer_hp;
      informasi_pengguna_email_textbox.value = res.data.data.customer_email;
    }
  });

  if(informasi_pengguna_phone_textbox.value == "")
    informasi_pengguna_phone_textbox.value = phone;
}

/**
 * End Of Informasi Pengguna Part
 */


/**
 * Informasi Kendaraan Part
 */

/**
 * @var integer
 */
const DEFAULT_VEHICLE_TYPE_OPTIONS = 1;

const INPUT_HTML = `<input type="radio" name="informasi-kendaraan-brand-type-switch" onClick="brandSwitchChange(this)" value="`;
const INPUT_HTML_ID = `" id="`;
const INPUT_HTML_APPEND = `" />`;
const INPUT_LABEL_PREPEND = `<label class="non-radius" for="`;
const INPUT_LABEL_FOR_ID = `">`;
const INPUT_LABEL_APPEND = `</label>`;

const informasi_kendaraan_brand_list = document.getElementById('informasi-kendaraan-brand-list');

function loadMasterBrands(type = DEFAULT_VEHICLE_TYPE_OPTIONS){
  var response = new BookingServices().getVehicleTypes(type);
  response.then( res => {
    /**
     * Remove brands list
     */
    informasi_kendaraan_brand_list
      .querySelectorAll('*')
        .forEach( n => n.remove() );

    /**
     * Append brands list with new ones.
     */
    var result_set = res.data.data;
    result_set.forEach( (e, i) => {
      informasi_kendaraan_brand_list.insertAdjacentHTML(
        'beforeend',
        INPUT_HTML 
        + e.id 
        + INPUT_HTML_ID 
        + e.id 
        + INPUT_HTML_APPEND 
        + INPUT_LABEL_PREPEND 
        + e.id 
        + INPUT_LABEL_FOR_ID 
        + e.brand_name 
        + INPUT_LABEL_APPEND
      );
    });
  });
}

/**
 * End Of Informasi Kendaraan Part
 */

/**
 * Informasi Kendaraan Part 
 */

/**
 * Batching MongoDB's Cache Data
 */

 /**
  * @global
  * @var integer? batch_id
  */
let batch_id = null;

const getCacheBatchId = () => {
  let response = new WorkshopServices().getWorkshopNearMe(
    selected_location.lat,
    selected_location.lng
  );

  response.then(
    res => {
      let result = res.data.data;
      batch_id = result.batch_id;
    }
  );
}

/**
 * Check if selected_location is already filled or not.
 */
const triggerGetBatchId = () => {
  setTimeout(
    () => {
      if(selected_location.lat !== null){
        getCacheBatchId();
      }else{
        triggerGetBatchId();
      }
    }, 2000
  );
}

triggerGetBatchId();

/**
 * End of Batching MongoDB's Cache Data
 */

const informasi_bengkel_workshop_list = document.getElementById('workshop-list');


const INFORMASI_BENGKEL_WORSKHOP_LIST_PRE_ID = `<div `;

const INFORMASI_BENGKEL_INPUT_HTML = `
       " style="font-size: 13px;" class="row mx-1 my-2 card-review align-items-center">
            <div style="height: 100px; width: 100%; background-color: lightgray;" class="col-3"></div>
            <div class="col-6 d-block">
                <p class="font-weight-bold ">
        `;

const INFORMASI_BENGKEL_APPEND_AFTER_TITLE = `
                </p>
                <p style="font-size: 10px;" class="">`;

        

const INFORMASI_BENGKEL_APPEND_AFTER_ADDRESS = `
                </p>
            </div>
            <div class="col-3">
                <div class="review font-weight-bold text-center ml-2">
                <i style="color: rgb(255, 217, 5);" class="fas fa-star"></i>            
            `;

const INFORMASI_BENGKEL_APPEND_AFTER_RATING = `</div></div>`;

function loadWorkshopNearby(bengkel_type, vehicle_type){

  let response = new WorkshopServices().getWorkshopByBatchId(batch_id, bengkel_type, vehicle_type);

  response.then( res => {
    let result_set = res.data.data;
    console.log("Response Workshop Nearby "+ JSON.stringify(res));
    console.log(result_set);


    /**
     * Remove Workshop List
     */

    informasi_bengkel_workshop_list
      .querySelectorAll('*')
        .forEach( n => n.remove() );

    result_set.forEach( e => {

        

      /**
       * Append workshop list with new ones.
       */
      informasi_bengkel_workshop_list.insertAdjacentHTML(
        'beforeend',
        `<div id="w-${e.id}" onclick="selectWorkshop(this); markWorkshop(${e.id}, ${e.bengkel_lat}, ${e.bengkel_long});" aria-workshop-name="${e.bengkel_name}" aria-workshop-address="${e.bengkel_name}"`
        + INFORMASI_BENGKEL_INPUT_HTML 
        + e.bengkel_name 
        + INFORMASI_BENGKEL_APPEND_AFTER_TITLE 
        + e.bengkel_alamat 
        + INFORMASI_BENGKEL_APPEND_AFTER_ADDRESS 
        + e.workshop_ratings
        + INFORMASI_BENGKEL_APPEND_AFTER_RATING
      );

 
      
    });
  });
}


/**
 * End of Informasi Kendaraan Part 
 */

 /**
  * Booking Order
  */

  const bookingOrder = () => {
    let request_payload = {
      /**
       * @see booking-view-model.js: 12 to 16
       */
      customer_name: informasi_pengguna_name_textbox.value, 
      customer_phone: informasi_pengguna_phone_textbox.value,
      customer_email: informasi_pengguna_email_textbox.value, 

      /**
       * @see booking.blade.php:187
       */
      customer_address: document.getElementById('informasi-bengkel-customer-address-textbox').value,
      
      /**
       * @obj booking_date @see booking.blade.php:205
       * @obj booking_time @see booking.blade.php:209
       */
      booking_date: document.getElementById('informasi-bengkel-booking-date-datecontrol').value,
      booking_time: document.getElementById('informasi-bengkel-booking-time-datecontrol').value,
      
      /**
       * @obj vehicle_type          @see booking.blade.php:23
       * @obj vehicle_brand_id      @see booking.blade.php:21
       * @obj vehicle_name          @see booking.blade.php:137
       * @obj vehicle_license_plat  @see booking.blade.php:141
       */
      vehicle_type: document.getElementById('vehicle_type').value,
      vehicle_brand_id: document.getElementById('brand_id').value,
      vehicle_name: document.getElementById('informasi-kendaraan-tipe-kendaraan').value,
      vehicle_license_plat: document.getElementById('informasi-kendaraan-nomor-polisi').value,
      
      /**
       * @see booking.blade.php:22 
       */
      bengkel_type: document.getElementById('bengkel_type').value,

      /**
       * @see booking.js:245
       */
      customer_lat: selected_location.lat,
      customer_lng: selected_location.lng,

      /**
       * @see booking.js:271
       */
      workshop_id: informasi_bengkel_selected_workshop_id,
    };

    /**
     * Check data validity. ?is anything null?
     */
    var validate = Object.values(request_payload);

    console.log(validate);

    /**
     * @see booking.js:177
     */
    form_error = 0;

    validate.forEach(
      (e, i) => {
        if(e == null || e == undefined){
          
          /**
           * If form incomplete, prompt to check again.
           */
          console.log("error index number "+ i);
          openErrorModal();
          return;
        }else{
          console.log(e);
        }
      }
    );

    if(form_error === 1){
      return;
    }

    let response = new BookingServices().createBooking(request_payload);
    response.then( res => {
      console.log(JSON.stringify(res));
    });
  }