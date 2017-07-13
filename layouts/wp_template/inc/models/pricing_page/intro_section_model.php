<?php

namespace VirgilSecurity\Models\PricingPage;


use VirgilSecurity\Customizer\PricingPage\IntroSection\Modifications\Sections\IntroSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class IntroSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_pricing_page_intro_section';

    /** @var IntroSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new IntroSectionMods();
    }
}
