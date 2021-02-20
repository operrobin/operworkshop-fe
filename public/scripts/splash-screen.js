/**
 * @constant
 */
const LOGO_PATH = "/assets/logo_operworkshop_putih.png";

const CHANGE_LOGO_TIMEOUT = 750; // 0.7 Second
const REDIRECT_TIMEOUT = 1450; // 1.5 Second


const jquery_logo_image = $('#logo-content');
const jquery_logo_text_image = $('#workshop-content');

/**
 * Timeout-ed Task
 */
setTimeout(
    () => {
        window.location.replace("/intro")
    }, 3000
);

setTimeout(
    () => {
        setTimeout(
            () => {
                jquery_logo_image.css({
                    'display': 'none'
                });

                jquery_logo_text_image.css({
                    'display': 'inline'
                });
            }, 500
        );
    }, 1500
);
