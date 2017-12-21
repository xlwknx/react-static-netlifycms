<?php

namespace VirgilSecurity\Models\FrontPage;


use VirgilSecurity\Customizer\FrontPage\UseCasesSection\Modifications\Sections\UseCasesSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class UseCasesSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_hp_use_cases_section';

    /** @var UseCasesSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new UseCasesSectionMods();
    }


    public function Headline()
    {
        $mod = $this->sectionMods->getUseCasesHeadlineMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Text()
    {
        $mod = $this->sectionMods->getUseCasesTextMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Links()
    {
        $mod = $this->sectionMods->getUseCasesLinksMod();

        if ($mod->isEnabled()) {
            return $this->filterCollection(
                (array)$mod->getValue()
            );
        }
    }


    public function Caption()
    {
        $mod = $this->sectionMods->getUseCasesListCaptionMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }
}
