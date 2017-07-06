<?php

use VirgilSecurity\SectionModifications;

if (!function_exists('virgilsecurity_get_hp_intro_msg_text')) :

    /**
     * Gets Intro Message for intro section
     *
     */
    function virgilsecurity_get_hp_intro_msg_text()
    {
        return SectionModifications::getInstance()
                                   ->getFrontPageSectionMods()
                                   ->getIntroSectionMods()
                                   ->getIntroMsgMod()
            ;
    }

endif;

if (!function_exists('virgilsecurity_get_hp_intro_links')) :

    /**
     * Gets Intro Links for intro section
     *
     */
    function virgilsecurity_get_hp_intro_links()
    {
        return SectionModifications::getInstance()
                                   ->getFrontPageSectionMods()
                                   ->getIntroSectionMods()
                                   ->getIntroLinksMod()
            ;
    }

endif;


if (!function_exists('virgilsecurity_get_hp_intro_langs')) :

    /**
     * Gets Intro Langs
     */
    function virgilsecurity_get_hp_intro_langs()
    {
        return SectionModifications::getInstance()
                                   ->getFrontPageSectionMods()
                                   ->getIntroSectionMods()
                                   ->getIntroLangsMod()
            ;
    }

endif;
