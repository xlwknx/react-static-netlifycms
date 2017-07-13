<?php

namespace VirgilSecurity\Models\PricingPage;


use VirgilSecurity\Customizer\PricingPage\ConclusionSection\Modifications\Sections\ConclusionSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class ConclusionSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_pricing_page_conclusion_section';

    /** @var ConclusionSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new ConclusionSectionMods();
    }
}
