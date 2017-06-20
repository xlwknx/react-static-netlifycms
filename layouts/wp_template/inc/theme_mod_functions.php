<?php
/**
 *  Declare a list of get_theme_mode wrapper functions, that is handy to use in templates.
 */

if (!function_exists('virgilsecurity_get_header_auth_links')) :

    /**
     * Gets Auth Links for header section
     *
     * @return array
     */
    function virgilsecurity_get_header_auth_links()
    {
        $values = get_theme_mod('header_auth_links');

        return is_array($values) ? $values : [];
    }

endif;

if (!function_exists('virgilsecurity_get_header_logo_image')) :

    /**
     * Gets logo image for header section
     *
     * @return string
     */
    function virgilsecurity_get_header_logo_image()
    {
        return get_theme_mod('header_logo_image');
    }

endif;

if (!function_exists('virgilsecurity_get_header_menu')) :

    /**
     * Gets menu for header section
     *
     * @return string
     */
    function virgilsecurity_get_header_menu()
    {
        return do_shortcode(get_theme_mod('header_menu'));
    }

endif;
