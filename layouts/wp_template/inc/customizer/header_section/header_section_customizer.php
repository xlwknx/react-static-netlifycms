<?php

namespace VirgilSecurity\Customizer\HeaderSection;


use VirgilSecurity\Customizer\HeaderSection\Fields\LogoImageField;
use VirgilSecurity\Customizer\HeaderSection\Fields\MenuCodeField;
use VirgilSecurity\Customizer\HeaderSection\Groups\AuthLinksGroup;
use VirgilSecurity\Customizer\HeaderSection\Modifications\Sections\HeaderSectionMods;

use WP_Customize_Manager;

class HeaderSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(HeaderSectionMods $footerSectionMods)
    {
        $section = new HeaderSection($this->config, $this->wpCustomizer);

        $section->addField(
            LogoImageField::createWithMod($footerSectionMods->getLogoImageMod())
        );

        $section->addField(
            MenuCodeField::createWithMod($footerSectionMods->getMenuCodeMod())
        );
        $section->addField(
            AuthLinksGroup::createWithMod($footerSectionMods->getAuthLinksMod())
        );

        return $section;
    }
}
