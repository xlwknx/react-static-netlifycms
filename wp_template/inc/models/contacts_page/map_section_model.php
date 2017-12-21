<?php

namespace VirgilSecurity\Models\ContactsPage;


use VirgilSecurity\Customizer\ContactsPage\MapSection\Modifications\Sections\MapSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class MapSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_contacts_page_map_section';

    /** @var MapSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new MapSectionMods();
    }


    public function Address()
    {
        $mod = $this->sectionMods->getMapAddressMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }
}
