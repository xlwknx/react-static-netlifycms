<?php

namespace VirgilSecurity\Models\FrontPage;


use VirgilSecurity\Customizer\FrontPage\ClientsSection\Modifications\Sections\ClientsSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class ClientsSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_hp_clients_section';

    /** @var ClientsSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new ClientsSectionMods();
    }
}
