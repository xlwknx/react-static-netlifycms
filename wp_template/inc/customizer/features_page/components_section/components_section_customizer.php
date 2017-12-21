<?php

namespace VirgilSecurity\Customizer\FeaturesPage\ComponentsSection;


use VirgilSecurity\Customizer\FeaturesPage\ComponentsSection\Fields\ComponentsHeadlineField;
use VirgilSecurity\Customizer\FeaturesPage\ComponentsSection\Groups\ComponentsLinksGroup;
use VirgilSecurity\Customizer\FeaturesPage\ComponentsSection\Groups\ComponentsListGroup;
use VirgilSecurity\Customizer\FeaturesPage\ComponentsSection\Modifications\Sections\ComponentsSectionMods;

use WP_Customize_Manager;

class ComponentsSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(ComponentsSectionMods $componentsSectionMods)
    {
        $section = new ComponentsSection($this->config, $this->wpCustomizer);

        $section->addField(
            ComponentsHeadlineField::createWithMod($componentsSectionMods->getComponentsHeadlineMod())
        );

        $section->addField(
            ComponentsListGroup::createWithMod($componentsSectionMods->getComponentsListMod())
        );

        $section->addField(
            ComponentsLinksGroup::createWithMod($componentsSectionMods->getComponentsLinksMod())
        );

        return $section;
    }
}
