
/**
 * Change logo after 4 seconds
 */
setTimeout(
    () => {
        $('#content img')
            .attr("src", "/assets/logo_operworkshop_putih.png")
            .attr("style", "max-width: 90vw !important");

        setTimeout(
            () => {
                window.location.replace("/intro");
            }
            , 4000
        );
    }
    , 4000
);