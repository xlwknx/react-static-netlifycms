<?php

namespace VirgilSecurity\Customizer\PricingPage\IncludesSection;


use VirgilSecurity\Customizer\PricingPage\IncludesSection\Fields\IncludesHeadlineField;
use VirgilSecurity\Customizer\PricingPage\IncludesSection\Fields\IncludesTextField;
use VirgilSecurity\Customizer\PricingPage\IncludesSection\Groups\IncludesListGroup;
use VirgilSecurity\Customizer\PricingPage\IncludesSection\Modifications\Sections\IncludesSectionMods;

use WP_Customize_Manager;

class IncludesSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(IncludesSectionMods $includesSectionMods)
    {
        $section = new IncludesSection($this->config, $this->wpCustomizer);

        $section->addField(
            IncludesHeadlineField::createWithMod($includesSectionMods->getIncludesHeadlineMod())
        );

        $section->addField(
            IncludesTextField::createWithMod($includesSectionMods->getIncludesTextMod())
        );

        $section->addField(
            IncludesListGroup::createWithMod($includesSectionMods->getIncludesListMod())
        );

        return $section;
    }
}
