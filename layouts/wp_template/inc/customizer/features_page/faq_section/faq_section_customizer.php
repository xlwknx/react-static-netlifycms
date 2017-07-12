<?php

namespace VirgilSecurity\Customizer\FrontPage\FaqSection;


use VirgilSecurity\Customizer\FeaturesPage\FaqSection\FaqSection;

use VirgilSecurity\Customizer\FeaturesPage\FaqSection\Modifications\Sections\FaqSectionMods;

use WP_Customize_Manager;

class FaqSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(FaqSectionMods $faqSectionMods)
    {
        $section = new FaqSection($this->config, $this->wpCustomizer);

        return $section;
    }
}
