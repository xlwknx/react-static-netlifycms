<?php

namespace VirgilSecurity\Models\PricingPage;


use VirgilSecurity\Customizer\PricingPage\IncludesSection\Modifications\Sections\IncludesSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class IncludesSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_pricing_page_includes_section';

    /** @var IncludesSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new IncludesSectionMods();
    }
}
