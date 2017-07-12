<?php

namespace VirgilSecurity\Models\FeaturesPage;


use VirgilSecurity\Customizer\FeaturesPage\ComponentsSection\Modifications\Sections\ComponentsSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class ComponentsSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_features_page_components_section';

    /** @var ComponentsSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new ComponentsSectionMods();
    }
}
