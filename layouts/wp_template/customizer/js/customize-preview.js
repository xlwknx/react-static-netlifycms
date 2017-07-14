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

    // wp.customize('header_menu', function (value) {
    //     value.bind(function (to) {
    //         $('.page .header .headerNav').text(to)
    //     });
    // });

})(jQuery);
