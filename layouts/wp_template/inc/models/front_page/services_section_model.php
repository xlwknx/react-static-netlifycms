<?php

namespace VirgilSecurity\Models\FrontPage;


use VirgilSecurity\Customizer\FrontPage\ServicesSection\Modifications\Sections\ServicesSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class ServicesSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_hp_services_section';

    /** @var ServicesSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new ServicesSectionMods();
    }

}
