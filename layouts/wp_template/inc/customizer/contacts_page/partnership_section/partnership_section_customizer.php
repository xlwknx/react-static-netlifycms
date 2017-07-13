<?php

namespace VirgilSecurity\Customizer\ContactsPage\PartnershipSection;


use VirgilSecurity\Customizer\ContactsPage\PartnershipSection\Modifications\Sections\PartnershipSectionMods;

use WP_Customize_Manager;

class PartnershipSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(PartnershipSectionMods $partnershipSectionMods)
    {
        $section = new PartnershipSection($this->config, $this->wpCustomizer);

        return $section;
    }
}
