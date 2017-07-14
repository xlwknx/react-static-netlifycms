<?php

namespace VirgilSecurity\Customizer\ContactsPage;


use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\ContactUsSectionCustomizer;

use VirgilSecurity\Customizer\ContactsPage\MapSection\MapSectionCustomizer;
use VirgilSecurity\Customizer\ContactsPage\PartnershipSection\PartnershipSectionCustomizer;

use WP_Customize_Manager;

class ContactsPageSectionsCustomizer
{
    protected $contactUsSectionCustomizer;
    protected $partnershipSectionCustomizer;
    protected $mapSectionCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->contactUsSectionCustomizer = new ContactUsSectionCustomizer($config, $wpCustomizer);
        $this->partnershipSectionCustomizer = new PartnershipSectionCustomizer($config, $wpCustomizer);
        $this->mapSectionCustomizer = new MapSectionCustomizer($config, $wpCustomizer);

    }


    /**
     * @return ContactUsSectionCustomizer
     */
    public function getContactUsSectionCustomizer()
    {
        return $this->contactUsSectionCustomizer;
    }


    /**
     * @return PartnershipSectionCustomizer
     */
    public function getPartnershipSectionCustomizer()
    {
        return $this->partnershipSectionCustomizer;
    }


    /**
     * @return MapSectionCustomizer
     */
    public function getMapSectionCustomizer()
    {
        return $this->mapSectionCustomizer;
    }
}
