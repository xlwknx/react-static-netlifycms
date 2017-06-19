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
        global $virgilsecurity_section_mods;

        $values = $virgilsecurity_section_mods->getHeaderSectionMods()
                                              ->getAuthLinksMod()
                                              ->getValue()
        ;


        return is_array($values) ? $values : [];
    }

endif;

if (!function_exists('virgilsecurity_get_hp_intro_msg_text')) :

    /**
     * Gets Intro Message for intro section
     *
     */
    function virgilsecurity_get_hp_intro_msg_text()
    {
        global $virgilsecurity_section_mods;

        return $values = $virgilsecurity_section_mods->getHpSectionMods()
                                                     ->getIntroSectionMods()
                                                     ->getIntroMsgMod()
                                                     ->getValue()
            ;
    }

endif;

if (!function_exists('virgilsecurity_get_hp_intro_links')) :

    /**
     * Gets Intro Links for intro section
     *
     * @return array
     */
    function virgilsecurity_get_hp_intro_links()
    {
        global $virgilsecurity_section_mods;

        $values = $virgilsecurity_section_mods->getHpSectionMods()
                                              ->getIntroSectionMods()
                                              ->getIntroLinksMod()
                                              ->getValue()
        ;

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
        global $virgilsecurity_section_mods;

        return $virgilsecurity_section_mods->getHeaderSectionMods()
                                           ->getLogoImageMod()
                                           ->getValue()
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

if (!function_exists('virgilsecurity_get_hp_intro_langs')) :

    /**
     * Gets Intro Langs
     *
     * @return array
     */
    function virgilsecurity_get_hp_intro_langs()
    {
        global $virgilsecurity_section_mods;

        return $virgilsecurity_section_mods->getHpSectionMods()
                                           ->getIntroSectionMods()
                                           ->getIntroLangsMod()
                                           ->getValue()
            ;
    }

endif;
