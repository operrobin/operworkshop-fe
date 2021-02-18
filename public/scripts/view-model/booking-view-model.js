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
  response = new UserServices().getUserByPhone(phone);

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
  response = new BookingServices().getVehicleTypes(type);
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
    result_set = res.data.data;
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

const informasi_bengkel_workshop_list = document.getElementById('workshop-list');


const INFORMASI_BENGKEL_WORSKHOP_LIST_PRE_ID = `<div `;

const INFORMASI_BENGKEL_INPUT_HTML = `
       " onclick="selectWorkshop(this)" style="font-size: 13px;" class="row mx-1 my-2 card-review align-items-center">
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

function loadWorkshopNearby(lat, lng, bengkel_type, vehicle_type){
  
  response = new MapsServices().getWorkshopNearMe(lat, lng, bengkel_type, vehicle_type);

  response.then( res => {
    result_set = res.data.data;


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
        `<div id="w-${e.id}" aria-workshop-name="${e.workshop_name}" aria-workshop-address="${e.workshop_address}"`
        + INFORMASI_BENGKEL_INPUT_HTML 
        + e.workshop_name 
        + INFORMASI_BENGKEL_APPEND_AFTER_TITLE 
        + e.workshop_address 
        + INFORMASI_BENGKEL_APPEND_AFTER_ADDRESS 
        + e.rating
        + INFORMASI_BENGKEL_APPEND_AFTER_RATING
      );

      /**
       * Place marker to the location
       */
      new google.maps.Marker({
          position: { lat: e.lat, lng: e.lng },
          map,
          title: e.workshop_name
      });
      
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
    checkLocationEnabled().then(
      (res) => {
        let request_payload = {
          customer_name: informasi_pengguna_name_textbox.value, 
          customer_phone: informasi_pengguna_phone_textbox.value,
          customer_email: informasi_pengguna_email_textbox.value, 
          vehicle_type: document.getElementById('vehicle_type').value,
          vehicle_brand_id: document.getElementById('brand_id').value,
          vehicle_name: document.getElementById('informasi-kendaraan-tipe-kendaraan').value,
          vehicle_license_plat: document.getElementById('informasi-kendaraan-nomor-polisi').value,
          bengkel_type: document.getElementById('bengkel_type').value,
          customer_lat: res.coords.latitude,
          customer_lng: res.coords.longitude,
          workshop_name: informasi_bengkel_payload.workshop_name,
          workshop_address: informasi_bengkel_payload.workshop_address
        };

        
      }
    );

  }