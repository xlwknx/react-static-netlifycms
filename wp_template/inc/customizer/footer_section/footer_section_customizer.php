<?php

namespace VirgilSecurity\Customizer\FooterSection;


use VirgilSecurity\Customizer\FooterSection\Fields\CopyrightField;
use VirgilSecurity\Customizer\FooterSection\Fields\EmailField;
use VirgilSecurity\Customizer\FooterSection\Fields\LogoDescriptionField;
use VirgilSecurity\Customizer\FooterSection\Fields\LogoImageField;

use VirgilSecurity\Customizer\FooterSection\Fields\NavCodeField;
use VirgilSecurity\Customizer\FooterSection\Fields\PolicyLinkField;
use VirgilSecurity\Customizer\FooterSection\Fields\PolicyLinkTextField;
use VirgilSecurity\Customizer\FooterSection\Fields\SlackLinkField;
use VirgilSecurity\Customizer\FooterSection\Fields\SlackLinkTextField;
use VirgilSecurity\Customizer\FooterSection\Modifications\CopyrightMod;
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

        $section->addField(
            NavCodeField::createWithMod($footerSectionMods->getNavCodeMod())
        );

        $section->addField(
            CopyrightField::createWithMod($footerSectionMods->getCopyrightMod())
        );

        $section->addField(
            EmailField::createWithMod($footerSectionMods->getEmailMod())
        );

        $section->addField(
            PolicyLinkTextField::createWithMod($footerSectionMods->getPolicyLinkTextMod())
        );

        $section->addField(
            PolicyLinkField::createWithMod($footerSectionMods->getPolicyLinkMod())
        );

        $section->addField(
            SlackLinkTextField::createWithMod($footerSectionMods->getSlackLinkTextMod())
        );

        $section->addField(
            SlackLinkField::createWithMod($footerSectionMods->getSlackLinkMod())
        );

        return $section;
    }
}
