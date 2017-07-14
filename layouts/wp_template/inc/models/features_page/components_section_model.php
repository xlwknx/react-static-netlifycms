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


    public function Headline()
    {
        $mod = $this->sectionMods->getComponentsHeadlineMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Collection()
    {
        $mod = $this->sectionMods->getComponentsListMod();

        if ($mod->isEnabled()) {
            return $this->filterCollection(
                (array)$mod->getValue(),
                [
                    'image' => [
                        [$this, 'imageModValueToModel'],
                    ],
                ]
            );
        }
    }


    public function Links()
    {
        $mod = $this->sectionMods->getComponentsLinksMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }
}
