<?php

namespace VirgilSecurity\Models\FrontPage;


use VirgilSecurity\Customizer\FrontPage\BenefitsSection\Modifications\Sections\BenefitsSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class BenefitsSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_hp_benefits_section';

    /** @var BenefitsSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new BenefitsSectionMods();
    }


    public function Collection()
    {
        $mod = $this->sectionMods->getBenefitsListMod();

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
