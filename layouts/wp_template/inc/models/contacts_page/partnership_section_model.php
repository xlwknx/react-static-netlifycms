<?php

namespace VirgilSecurity\Models\ContactsPage;


use VirgilSecurity\Customizer\ContactsPage\PartnershipSection\Modifications\Sections\PartnershipSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class PartnershipSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_contacts_page_partnership_section';

    /** @var PartnershipSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new PartnershipSectionMods();
    }
}
