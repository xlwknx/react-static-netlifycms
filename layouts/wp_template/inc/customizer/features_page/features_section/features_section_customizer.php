<?php

namespace VirgilSecurity\Customizer\FrontPage\FeaturesSection;


use VirgilSecurity\Customizer\FeaturesPage\FeaturesSection\FeaturesSection;

use VirgilSecurity\Customizer\FeaturesPage\FeaturesSection\Modifications\Sections\FeaturesSectionMods;
use WP_Customize_Manager;

class FeaturesSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(FeaturesSectionMods $featuresSectionMods)
    {
        $section = new FeaturesSection($this->config, $this->wpCustomizer);

        return $section;
    }
}
