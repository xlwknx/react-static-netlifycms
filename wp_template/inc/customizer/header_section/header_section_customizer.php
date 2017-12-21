<?php

namespace VirgilSecurity\Customizer\HeaderSection;


use VirgilSecurity\Customizer\HeaderSection\Fields\LogoImageField;
use VirgilSecurity\Customizer\HeaderSection\Fields\MenuCodeField;
use VirgilSecurity\Customizer\HeaderSection\Fields\MobileLinkTextField;
use VirgilSecurity\Customizer\HeaderSection\Fields\MobileLinkUrlField;
use VirgilSecurity\Customizer\HeaderSection\Fields\MobileMenuCodeField;
use VirgilSecurity\Customizer\HeaderSection\Groups\AuthLinksGroup;
use VirgilSecurity\Customizer\HeaderSection\Modifications\MobileLinkTextMod;
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


    public function getSection(HeaderSectionMods $headerSectionMods)
    {
        $section = new HeaderSection($this->config, $this->wpCustomizer);

        $section->addField(
            LogoImageField::createWithMod($headerSectionMods->getLogoImageMod())
        );

        $section->addField(
            MenuCodeField::createWithMod($headerSectionMods->getMenuCodeMod())
        );
        $section->addField(
            AuthLinksGroup::createWithMod($headerSectionMods->getAuthLinksMod())
        );

        $section->addField(
            MobileMenuCodeField::createWithMod($headerSectionMods->getMobileMenuCodeMod())
        );

        $section->addField(
            MobileLinkTextField::createWithMod($headerSectionMods->getMobileLinkTextMod())
        );

        $section->addField(
            MobileLinkUrlField::createWithMod($headerSectionMods->getMobileLinkUrlMod())
        );

        return $section;
    }
}
