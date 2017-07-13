<?php

namespace VirgilSecurity\Customizer\PricingPage\EnterpriseSection;


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

        return $section;
    }
}
