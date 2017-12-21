<?php

namespace VirgilSecurity\Models\FeaturesPage;


use VirgilSecurity\Customizer\FeaturesPage\ConclusionSection\Modifications\Sections\ConclusionSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class ConclusionSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_features_page_conclusion_section';

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
        $modList = $this->sectionMods->getConclusionLinksMod();

        if ($modList->isEnabled()) {
            return $this->filterCollection(
                (array)$modList->getValue()
            );
        }
    }
}
