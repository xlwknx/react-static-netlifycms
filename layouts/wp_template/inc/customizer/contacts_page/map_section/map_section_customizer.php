<?php

namespace VirgilSecurity\Customizer\ContactsPage\MapSection;


use VirgilSecurity\Customizer\ContactsPage\MapSection\Modifications\Sections\MapSectionMods;

use WP_Customize_Manager;

class MapSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(MapSectionMods $mapSectionMods)
    {
        $section = new MapSection($this->config, $this->wpCustomizer);

        return $section;
    }
}
