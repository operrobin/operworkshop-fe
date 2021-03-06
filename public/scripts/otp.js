/*
 |--------------------------------------------------------------------------
 | DOM Part
 |--------------------------------------------------------------------------
 |
 | This part is used for any DOM related logic.
 |
 */    

let getCodeBoxElement = index => document.getElementById('codeBox' + index); 

function onKeyUpEvent(index, event) {
  const eventCode = event.which || event.keyCode;
  if (getCodeBoxElement(index).value.length === 1) {
     if (index !== 4) {
        getCodeBoxElement(index+ 1).focus();
     } else {
        getCodeBoxElement(index).blur();
        // Submit code
        console.log('submit code ');
     }
  }
  if (eventCode === 8 && index !== 1) {
     getCodeBoxElement(index - 1).focus();
  }
}

function onFocusEvent(index) {
  for (let item = 1; item < index; item++) {
     const currentElement = getCodeBoxElement(item);
     if (!currentElement.value) {
          currentElement.focus();
          break;
     }
  }
}

/*
 |--------------------------------------------------------------------------
 | Data Part
 |--------------------------------------------------------------------------
 |
 | This part is used for any Data related logic.
 |
 */

/**
 * Const
 */
const otp_phone_input = document.getElementById('otp-phone-input');
const otp_confirmation_button = document.getElementById('konfirmasi-btn');

const code_box_1 = document.getElementById('codeBox1');
const code_box_2 = document.getElementById('codeBox2');
const code_box_3 = document.getElementById('codeBox3');
const code_box_4 = document.getElementById('codeBox4');

const otp_error_message = document.getElementById('error-message');

otp_phone_input.addEventListener('keyup', (e) => {
  if(otp_phone_input.value.length >= 10){
   otp_confirmation_button.removeAttribute("disabled");
  }else{
   otp_confirmation_button.setAttribute('disabled', 'disabled');
  }
});

function sendOTP(){
  let phone = otp_phone_input.value;

  new AuthServices().authentication(phone);
}


async function session_saver (otp) {

   return await $.ajax({
      "type": "POST",
      "url": "/set-web-session",
      "data": {
         "key": "customer_phone",
         "value": otp
      }
   });

}

function login(){
   
   loaderOn();

   let otp_code = `${code_box_1.value}${code_box_2.value}${code_box_3.value}${code_box_4.value}`;

   let response = new AuthServices().sendOtp(otp_phone_input.value, otp_code);

   response.then(res => {
      if(res.data.status){

         /**
          * @issue 
          * The web middleware not permit me to using axios to send request.
          */

         session_saver(otp_phone_input.value)
               .then(
                  (ris) => {
                     // console.log(ris);
                     window.location.href = "/booking";
                  }
               );

      }else{
         loaderOff();

        code_box_1.value = "";
        code_box_2.value = "";
        code_box_3.value = "";
        code_box_4.value = "";

        otp_error_message.classList.remove("d-none");
        otp_error_message.classList.add("d-flex");
      }

   });
}

/*
 |--------------------------------------------------------------------------
 | Permission Part
 |--------------------------------------------------------------------------
 |
 | This part is used for any Permission related logic.
 |
 */

navigator.permissions.query({name: 'geolocation'});
