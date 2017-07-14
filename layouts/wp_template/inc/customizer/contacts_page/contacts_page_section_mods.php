<?php

namespace VirgilSecurity\Customizer\ContactsPage;


use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Modifications\Sections\ContactUsSectionMods;

use VirgilSecurity\Customizer\ContactsPage\MapSection\Modifications\Sections\MapSectionMods;

use VirgilSecurity\Customizer\ContactsPage\PartnershipSection\Modifications\Sections\PartnershipSectionMods;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class ContactsPageSectionMods extends BaseSectionMods
{
    protected $contactUsSectionMods;
    protected $partnershipSectionMods;
    protected $mapSectionMods;


    public function __construct()
    {
        $this->contactUsSectionMods = new ContactUsSectionMods();
        $this->partnershipSectionMods = new PartnershipSectionMods();
        $this->mapSectionMods = new MapSectionMods();
    }


    public function setupDefaults()
    {
        $this->contactUsSectionMods->setupDefaults();
        $this->partnershipSectionMods->setupDefaults();
        $this->mapSectionMods->setupDefaults();
    }


    /**
     * @return ContactUsSectionMods
     */
    public function getContactUsSectionMods()
    {
        return $this->contactUsSectionMods;
    }


    /**
     * @return PartnershipSectionMods
     */
    public function getPartnershipSectionMods()
    {
        return $this->partnershipSectionMods;
    }


    /**
     * @return MapSectionMods
     */
    public function getMapSectionMods()
    {
        return $this->mapSectionMods;
    }
}
