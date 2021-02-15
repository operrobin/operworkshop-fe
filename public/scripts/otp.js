/*
 |--------------------------------------------------------------------------
 | DOM Part
 |--------------------------------------------------------------------------
 |
 | This part is used for any DOM related logic.
 |
 */    

getCodeBoxElement = index => document.getElementById('codeBox' + index); 

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
  for (item = 1; item < index; item++) {
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

function sendOTP(){
  window.location.replace('/booking');

  return 0;
  phone = otp_phone_input.value;

  new AuthServices().Authentication(phone);
}

