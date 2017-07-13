<?php

namespace VirgilSecurity\Customizer\PricingPage\ConclusionSection;


use VirgilSecurity\Customizer\PricingPage\ConclusionSection\Modifications\Sections\ConclusionSectionMods;

use WP_Customize_Manager;

class ConclusionSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(ConclusionSectionMods $conclusionSectionMods)
    {
        $section = new ConclusionSection($this->config, $this->wpCustomizer);

        return $section;
    }
}
