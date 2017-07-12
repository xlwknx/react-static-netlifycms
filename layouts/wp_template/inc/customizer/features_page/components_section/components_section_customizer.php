<?php

namespace VirgilSecurity\Customizer\FeaturesPage\ComponentsSection;


use VirgilSecurity\Customizer\FeaturesPage\ComponentsSection\ComponentsSection;

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

        return $section;
    }
}
