<?php

namespace VirgilSecurity\Customizer\PricingPage\IntroSection;


use VirgilSecurity\Customizer\PricingPage\IntroSection\Modifications\Sections\IntroSectionMods;

use WP_Customize_Manager;

class IntroSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(IntroSectionMods $introSectionMods)
    {
        $section = new IntroSection($this->config, $this->wpCustomizer);

        return $section;
    }
}
