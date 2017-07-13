<?php

namespace VirgilSecurity\Models\ContactsPage;


use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Modifications\Sections\ContactUsSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class ContactUsSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_contacts_page_contact_us_section';

    /** @var ContactUsSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new ContactUsSectionMods();
    }
}
