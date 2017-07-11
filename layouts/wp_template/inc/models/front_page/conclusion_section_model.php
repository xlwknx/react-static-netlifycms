<?php

namespace VirgilSecurity\Models\FrontPage;


use VirgilSecurity\Customizer\FrontPage\ConclusionSection\Modifications\Sections\ConclusionSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class ConclusionSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_hp_conclusion_section';

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


    public function Text()
    {
        $mod = $this->sectionMods->getConclusionTextMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Links()
    {
        $mod = $this->sectionMods->getConclusionLinksListMod();

        if ($mod->isEnabled()) {
            return $this->filterCollection($mod->getValue());
        }
    }
}
