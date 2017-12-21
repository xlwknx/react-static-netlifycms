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


    public function Headline()
    {
        $mod = $this->sectionMods->getConclusionHeadlineMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Links()
    {
        $mod = $this->sectionMods->getConclusionLinksMod();

        if ($mod->isEnabled()) {
            return $this->filterCollection(
                $mod->getValue()
            );
        }
    }
}
