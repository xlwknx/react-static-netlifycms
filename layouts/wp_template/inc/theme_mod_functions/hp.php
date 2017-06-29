<?php

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
        global $virgilsecurity_section_mods;

        return $virgilsecurity_section_mods->getHpSectionMods()
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
        global $virgilsecurity_section_mods;

        return $virgilsecurity_section_mods->getHpSectionMods()
                                           ->getIntroSectionMods()
                                           ->getIntroLangsMod()
            ;
    }

endif;
