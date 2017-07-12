<?php

namespace VirgilSecurity\Models\FeaturesPage;


use VirgilSecurity\Customizer\FeaturesPage\IntroCryptogramSection\Modifications\Sections\IntroCryptogramSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class IntroCryptogramSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_features_page_intro_cryptogram_section';

    /** @var IntroCryptogramSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new IntroCryptogramSectionMods();
    }
}
