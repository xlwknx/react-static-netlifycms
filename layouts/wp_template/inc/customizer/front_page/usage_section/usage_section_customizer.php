<?php

namespace VirgilSecurity\Customizer\FrontPage\UsageSection;


use VirgilSecurity\Customizer\FrontPage\UsageSection\Modifications\Sections\UsageSectionMods;

use VirgilSecurity\Customizer\FrontPage\UsageSection\Fields\UsageHeadlineField;
use VirgilSecurity\Customizer\FrontPage\UsageSection\Fields\UsageTextField;
use VirgilSecurity\Customizer\FrontPage\UsageSection\Groups\UsageSlideListGroup;

use WP_Customize_Manager;

class UsageSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(UsageSectionMods $usageSectionMods)
    {
        $section = new UsageSection($this->config, $this->wpCustomizer);

        $section->addField(
            UsageHeadlineField::createWithMod($usageSectionMods->getUsageHeadlineMod())
        );

        $section->addField(
            UsageTextField::createWithMod($usageSectionMods->getUsageTextMod())
        );

        $section->addField(
            UsageSlideListGroup::createWithMod($usageSectionMods->getUsageSlideListMod())
        );


        return $section;
    }
}
