<?php

namespace VirgilSecurity\Models\PricingPage;


use VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Modifications\Sections\EnterpriseSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class EnterpriseSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_pricing_page_enterprise_section';

    /** @var EnterpriseSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new EnterpriseSectionMods();
    }
}
