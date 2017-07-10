<?php

namespace VirgilSecurity\Customizer\FrontPage\BenefitsSection;


use VirgilSecurity\Customizer\FrontPage\BenefitsSection\Modifications\Sections\BenefitsSectionMods;

use WP_Customize_Manager;

class BenefitsSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(BenefitsSectionMods $benefitsSectionMods)
    {
        $section = new BenefitsSection($this->config, $this->wpCustomizer);


        return $section;
    }
}
