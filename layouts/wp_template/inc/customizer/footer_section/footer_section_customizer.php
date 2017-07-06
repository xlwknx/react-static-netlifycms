<?php

namespace VirgilSecurity\Customizer\FooterSection;


use VirgilSecurity\Customizer\FooterSection\Fields\LogoDescriptionField;
use VirgilSecurity\Customizer\FooterSection\Fields\LogoImageField;

use VirgilSecurity\Customizer\FooterSection\Modifications\Sections\FooterSectionMods;

use VirgilSecurity\Customizer\Groups\SocialLinksGroup;
use WP_Customize_Manager;

class FooterSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(FooterSectionMods $footerSectionMods)
    {
        $section = new FooterSection($this->config, $this->wpCustomizer);

        $section->addField(
            LogoImageField::createWithMod($footerSectionMods->getLogoImageMod())
        );

        $section->addField(
            LogoDescriptionField::createWithMod($footerSectionMods->getLogoDescription())
        );

        $section->addField(
            SocialLinksGroup::createWithMod($footerSectionMods->getSocialLinksMod())
        );

        return $section;
    }
}
