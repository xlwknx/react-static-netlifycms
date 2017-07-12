<?php

namespace VirgilSecurity\Models\FeaturesPage;


use VirgilSecurity\Customizer\FeaturesPage\FeaturesSection\Modifications\Sections\FeaturesSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class FeaturesSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_features_page_features_section';

    /** @var FeaturesSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new FeaturesSectionMods();
    }
}
