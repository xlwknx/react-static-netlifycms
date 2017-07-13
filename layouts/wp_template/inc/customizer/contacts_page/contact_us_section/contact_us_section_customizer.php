<?php

namespace VirgilSecurity\Customizer\ContactsPage\ContactUsSection;


use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Modifications\Sections\ContactUsSectionMods;
use WP_Customize_Manager;

class ContactUsSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(ContactUsSectionMods $contactUsSectionMods)
    {
        $section = new ContactUsSection($this->config, $this->wpCustomizer);

        return $section;
    }
}
