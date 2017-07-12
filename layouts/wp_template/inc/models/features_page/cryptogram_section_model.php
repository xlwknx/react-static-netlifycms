<?php

namespace VirgilSecurity\Models\FeaturesPage;


use VirgilSecurity\Customizer\FeaturesPage\CryptogramSection\Modifications\Sections\CryptogramSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class CryptogramSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_features_page_cryptogram_section';

    /** @var CryptogramSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new CryptogramSectionMods();
    }


    public function Headline()
    {
        $mod = $this->sectionMods->getCryptogramHeadlineMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Collection()
    {
        $modList = $this->sectionMods->getCryptogramListMod();

        if ($modList->isEnabled()) {
            return $this->filterCollection(
                (array)$modList->getValue(),
                [
                    'image' => [
                        [$this, 'imageModValueToModel'],
                    ],
                    'items' => [
                        function ($items) {
                            return explode(',', $items);
                        },
                    ],
                ]
            );
        }
    }
}
