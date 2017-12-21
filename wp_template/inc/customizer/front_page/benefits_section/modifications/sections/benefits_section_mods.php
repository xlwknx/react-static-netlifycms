<?php

namespace VirgilSecurity\Customizer\FrontPage\BenefitsSection\Modifications\Sections;


use VirgilSecurity\Customizer\FrontPage\BenefitsSection\Modifications\BenefitsListMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class BenefitsSectionMods extends BaseSectionMods
{
    protected $BenefitsListMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getBenefitsListMod(),
            ]
        );
    }


    public function getBenefitsListMod()
    {
        if ($this->BenefitsListMod == null) {
            $this->BenefitsListMod = new BenefitsListMod();
        }

        return $this->BenefitsListMod;
    }


}
