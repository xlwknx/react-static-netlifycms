/**
 * File customize-preview.js.
 *
 * Instantly live-update customizer settings in the preview for improved user experience.
 */

(function ($) {
    wp.customize('header_logo_image', function (value) {
        value.bind(function (to) {
            $('.page .header .header-logo a img').attr('src', to);
        });
    });

    // wp.customize('hp_intro_msg_headline', function (value) {
    //     value.bind(function (to) {
    //         $('.intro .introContentBlock .blockMsg .blockMsg-headline').text(to);
    //     });
    // });

})(jQuery);
