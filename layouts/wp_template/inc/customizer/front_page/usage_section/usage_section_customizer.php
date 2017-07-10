<?php

namespace VirgilSecurity\Customizer\FrontPage\UsageSection;


use VirgilSecurity\Customizer\FrontPage\UsageSection\Modifications\Sections\UsageSectionMods;

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


        return $section;
    }
}
