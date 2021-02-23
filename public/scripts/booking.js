/*
 |--------------------------------------------------------------------------
 | DOM Booking Part
 |--------------------------------------------------------------------------
 |
 | This part is used for any DOM related logic.
 |
 */ 

/**
 * @regex 
 */
const EMAIL_REGEX = /^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$/;
const REGEX_NOMOR_POLISI = /^([A-Za-z0-9]{1,4})(\s|-)*([0-9]{1,5})(\s|-)*([A-Za-z]{0,3})$/;


/**
 * Informasi Pengguna Part
 */
const jquery_informasi_pengguna_forms = $('#informasi-pengguna-name-textbox, #informasi-pengguna-phone-textbox,#informasi-pengguna-email-textbox');
const jquery_informasi_pengguna_next_button = $('#informasi-pengguna-next-button');


/**
 * Selanjutnya Button Validation
 */
jquery_informasi_pengguna_forms.on('keyup', (e) => {
  name_val = jquery_informasi_pengguna_forms[0].value;
  phone_val = jquery_informasi_pengguna_forms[1].value;
  email_val = jquery_informasi_pengguna_forms[2].value;

  if(name_val == ""){
    return;
  } 

  if(phone_val == ""){
    return;
  } 

  if(email_val == "" || !email_val.match(EMAIL_REGEX)){
    return;
  }

  jquery_informasi_pengguna_next_button.removeAttr("disabled");

});


/**
 * Informasi Kendaraan Part
 */
const jquery_vehicle_type_radio = $('input[name=informasi-kendaraan-type-radio]');
const jquery_input_brand_id = $('#brand_id');
const jquery_input_vehicle_type = $('#vehicle_type');
const jquery_informasi_kendaraan_forms = $('#brand_id, #informasi-kendaraan-tipe-kendaraan, #informasi-kendaraan-nomor-polisi');
const jquery_informasi_kendaraan_next_button = $('#informasi-kendaraan-next-button'); 

/**
 * SCREW YOU JAVASCRIPT DOM !!!
 */
jquery_vehicle_type_radio.on('change', (e) => {
  value = e.currentTarget.value;
  loadMasterBrands(value);
  jquery_input_vehicle_type.val(value);
});

/**
 * Vehicle's Brand Switch Function
 */
function brandSwitchChange(e){
  console.log(e);

  jquery_input_brand_id.val(e.value)
}

/**
 * Informasi Kendaraan Form Validation
 */
jquery_informasi_kendaraan_forms.on('keyup', (e) => {
  brand_id = jquery_informasi_kendaraan_forms[0].value;
  tipe_val = jquery_informasi_kendaraan_forms[1].value;
  nomor_polisi_val = jquery_informasi_kendaraan_forms[2].value;

  if(brand_id == ""){
    return;
  } 

  if(tipe_val == ""){
    return;
  } 

  if(nomor_polisi_val == "" || !nomor_polisi_val.match(REGEX_NOMOR_POLISI)){
    return;
  }

  jquery_informasi_kendaraan_next_button.removeAttr("disabled");

});

/**
 * End Of Informasi Kendaraan Part
 */

/**
 * Informasi Bengkel Part 
 */

const jquery_informasi_bengkel_bengkel_type = $('#bengkel_type');
const jquery_informasi_bengkel_bengkel_type_radio = $('input[name=informasi-bengkel-type-radio]');
const jquery_informasi_bengkel_workshop_list = $('#workshop-list');

jquery_informasi_bengkel_bengkel_type_radio.on('change', (e) => {
  value = e.currentTarget.value;
  jquery_informasi_bengkel_bengkel_type.val(value);
});

/**
 * Load Informasi Bengkel data once "Selanjutnya" button in "Informasi Kendaraan" clicked
 */
jquery_informasi_kendaraan_next_button.on('click', () => {
  getCurrentLocation().then(
    res => {
      loadWorkshopNearby(
        res.coords.latitude,
        res.coords.longitude,
        jquery_informasi_bengkel_bengkel_type.val(),
        jquery_input_vehicle_type.val()
      );
    }
  );
});

let informasi_bengkel_payload = {
  workshop_name: null,
  workshop_address: null
}

function selectWorkshop(e){
  console.log(e);
  $('#workshop-list div').removeClass('active');
  e.classList.add('active');
  console.log(e.getAttribute('aria-workshop-id'));
}

/**
 * End of Informasi Bengkel Part 
 */

/*
 |--------------------------------------------------------------------------
 | Map Part
 |--------------------------------------------------------------------------
 |
 | This part is used for any Map related logic.
 |
 */    

const location_prompt_modal = $('#location-prompt-modal');
const maps_warning = $('#maps-warning');
const show_maps_instruction_button = $('#show-maps-instruction-btn');

show_maps_instruction_button.on('click', () => {
  location_prompt_modal.modal('show');
});

/**
 * Permission Changes
 */

navigator.permissions.query({name:'geolocation'}).then(function(res) {
  res.onchange = function() {
    if(this.state == "denied"){
      maps_warning.removeClass('d-none').addClass('d-flex');
    }else{
      maps_warning.addClass('d-none').removeClass('d-flex');
    }
  };
});

const checkLocationEnabled = () => {
  navigator.permissions.query({name: 'geolocation'}).then(
    (res) => {
      if(res.state == "denied"){
        location_prompt_modal.modal('show');
        maps_warning.removeClass('d-none').addClass('d-flex');
      }
  });
}

checkLocationEnabled();

/**
 * Geolocation Part
 */

const getCurrentLocation = async () => {
  return new Promise((res, rej) => {
    navigator.geolocation.getCurrentPosition(res, rej);
  });
}

/**
 * Map Object
 */
let map = null;

initMap = () => {
  const db = {lat: -6.1622882, lng: 106.7624412};

  getCurrentLocation().then(
    (res) => {
      db.lat = res.coords.latitude;
      db.lng = res.coords.longitude;
  
      map = new google.maps.Map(document.getElementById('show_maps'), {
        center: db,
        zoom: 12
      });
  });
}

/**
 * DOM for onclick Bengkel
 */

let markers = [];

let informasi_bengkel_selected_workshop_id = null;

const markWorkshop = (id, lat, lng) => {
  /**
   * Clear markers
   */
  for(let i = 0; i < markers.length; i++){
    markers[i].setMap(null);
  }

  /**
   * Place marker to the location
   */

  markers.push(
    new google.maps.Marker({
      position: { lat: lat, lng: lng },
      map
    })
  );

  informasi_bengkel_selected_workshop_id = id;
}
