<?php

namespace VirgilSecurity\Models\PricingPage;


use VirgilSecurity\Customizer\PricingPage\IncludesSection\Modifications\Sections\IncludesSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class IncludesSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_pricing_page_includes_section';

    /** @var IncludesSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new IncludesSectionMods();
    }


    public function Headline()
    {
        $mod = $this->sectionMods->getIncludesHeadlineMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Text()
    {
        $mod = $this->sectionMods->getIncludesTextMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Collection()
    {
        $mod = $this->sectionMods->getIncludesListMod();

        if ($mod->isEnabled()) {
            return $this->filterCollection(
                $mod->getValue(),
                [
                    'image' => [
                        [$this, 'imageModValueToModel'],
                    ],
                ]
            );
        }
    }
}
