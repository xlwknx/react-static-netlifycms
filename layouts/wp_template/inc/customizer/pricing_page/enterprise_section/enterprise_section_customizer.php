<?php

namespace VirgilSecurity\Customizer\PricingPage\EnterpriseSection;


use VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Fields\EnterpriseImageField;
use VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Fields\EnterpriseTextField;
use VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Fields\EnterpriseTitleField;

use VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Groups\EnterpriseListGroup;
use VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Groups\EnterpriseLinksGroup;

use VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Modifications\Sections\EnterpriseSectionMods;

use WP_Customize_Manager;

class EnterpriseSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(EnterpriseSectionMods $enterpriseSectionMods)
    {
        $section = new EnterpriseSection($this->config, $this->wpCustomizer);

        $section->addField(
            EnterpriseImageField::createWithMod($enterpriseSectionMods->getEnterpriseImageMod())
        );

        $section->addField(
            EnterpriseTitleField::createWithMod($enterpriseSectionMods->getEnterpriseTitleMod())
        );

        $section->addField(
            EnterpriseTextField::createWithMod($enterpriseSectionMods->getEnterpriseTextMod())
        );

        $section->addField(
            EnterpriseListGroup::createWithMod($enterpriseSectionMods->getEnterpriseListMod())
        );

        $section->addField(
            EnterpriseLinksGroup::createWithMod($enterpriseSectionMods->getEnterpriseLinksMod())
        );

        return $section;
    }
}
