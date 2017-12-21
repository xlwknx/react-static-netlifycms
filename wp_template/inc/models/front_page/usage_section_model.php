<?php

namespace VirgilSecurity\Models\FrontPage;


use VirgilSecurity\Customizer\FrontPage\UsageSection\Modifications\Sections\UsageSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class UsageSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_hp_usage_section';

    /** @var UsageSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new UsageSectionMods();
    }


    public function Headline()
    {
        $mod = $this->sectionMods->getUsageHeadlineMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Text()
    {
        $mod = $this->sectionMods->getUsageTextMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Slider()
    {
        $mod = $this->sectionMods->getUsageSlideListMod();

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
}
