
/**
 * @const Javascript DOM Object
 * DOMs
 */
const step_nails = document.getElementById('step-nails');
const step_introduction = document.getElementsByClassName('step-introduction');
const bottom_screen_button = document.getElementById('bottom-btn');
const content = document.getElementById('introduction-screen-touch-area');

/**
 * @const JQuery Object
 * JQuery DOM Object
 */

const jquery_step_introduction = $('#introduction-screen-texts');
const jquery_step_circles = $('.step-circle');

/**
 * @const string
 * Used for button wording
 */
const BUTTON_WORDING_FIRST = "Halaman booking service";
const BUTTON_WORDING_LAST = "Booking servis sekarang";

/*
 |--------------------------------------------------------------------------
 | DOM Part
 |--------------------------------------------------------------------------
 |
 | This part is used for any DOM related logic.
 |
 */ 

let slide_number = 1;
let current_pos = 0;

const scroll_left = () => {
    current_pos -= $(window).width();
    jquery_step_introduction.animate({
        left: "-=" + $(window).width()
    }, 500);

    console.log(current_pos);
}

const scroll_right = () => {
    current_pos += $(window).width();

    jquery_step_introduction.animate({
        left: "+=" + $(window).width()
    }, 500);

    console.log(current_pos);
}

/**
 * @var string
 * trigger_scroll parameters.
 */
const PLUS = "plus";
const MIN = "minus";

/**
 * @param string req
 *  request => Only string "plus" and "minux" 
 * 
 * @return mixed
 *  return 0 if false
 *  return void if true.
 */
const trigger_scroll = (req) => {


    switch(req){
        case PLUS: 

            if(slide_number ===  5){
                return 0;
            }else{
                slide_number++;

                if(slide_number === 5){
                    bottom_screen_button.innerHTML = BUTTON_WORDING_LAST;
                }

                scroll_left();
            }

            break;

        case MIN:
            if(slide_number ===  1){
                return 0;
            }else{
                slide_number--;

                if(slide_number !== 5){
                    bottom_screen_button.innerHTML = BUTTON_WORDING_FIRST;
                }
                scroll_right();
            }
            break;

        default:

            return 0;
    }
    for(let i = 0; i < jquery_step_circles.length; i++){
        jquery_step_circles[i].classList.remove('active');
    }
    
    jquery_step_circles[slide_number - 1].classList.add('active');
}

/**
 * @var integer touch_start
 *  Indicate last X position of touch start event.
 */
let touch_start = null;

content.addEventListener('touchstart', (e) => {
  touch_start = e.changedTouches[0].clientX;
});

content.addEventListener('touchend', (e) => {
  if(touch_start > e.changedTouches[0].clientX){
    trigger_scroll(PLUS);
  }else{
    trigger_scroll(MIN);
  }
});