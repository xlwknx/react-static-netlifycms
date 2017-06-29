<?php

if (!function_exists('virgilsecurity_get_header_logo_image')) :

    /**
     * Gets logo image for header section
     *
     */
    function virgilsecurity_get_header_logo_image()
    {
        global $virgilsecurity_section_mods;

        return $virgilsecurity_section_mods->getHeaderSectionMods()
                                           ->getLogoImageMod()
            ;
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

if (!function_exists('virgilsecurity_get_header_auth_links')) :

    /**
     * Gets Auth Links for header section
     *
     */
    function virgilsecurity_get_header_auth_links()
    {
        global $virgilsecurity_section_mods;

        return $virgilsecurity_section_mods->getHeaderSectionMods()
                                           ->getAuthLinksMod()
            ;
    }

endif;
