<?php

namespace VirgilSecurity\Customizer\FrontPage\IntroSection;


use VirgilSecurity\Customizer\FrontPage\IntroSection\Fields\IntroMsgField;
use VirgilSecurity\Customizer\FrontPage\IntroSection\Groups\IntroLangsGroup;
use VirgilSecurity\Customizer\FrontPage\IntroSection\Groups\IntroLinksGroup;
use VirgilSecurity\Customizer\FrontPage\IntroSection\Modifications\Sections\IntroSectionMods;

use WP_Customize_Manager;

class IntroSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(IntroSectionMods $introSectionMods)
    {
        $section = new IntroSection($this->config, $this->wpCustomizer);

        $section->addField(
            IntroMsgField::createWithMod($introSectionMods->getIntroMsgMod())
        );

        $section->addField(
            IntroLinksGroup::createWithMod($introSectionMods->getIntroLinksMod())
        );

        $section->addField(
            IntroLangsGroup::createWithMod($introSectionMods->getIntroLangsMod())
        );

        return $section;
    }
}
