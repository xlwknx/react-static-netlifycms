<?php

namespace VirgilSecurity\Customizer\FeaturesPage\FeaturesSection\Modifications\Sections;


use VirgilSecurity\Customizer\FeaturesPage\FeaturesSection\Modifications\FeaturesListMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class FeaturesSectionMods extends BaseSectionMods
{
    protected $FeaturesListMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getFeaturesListMod(),
            ]
        );
    }


    public function getFeaturesListMod()
    {
        if ($this->FeaturesListMod == null) {
            $this->FeaturesListMod = new FeaturesListMod();
        }

        return $this->FeaturesListMod;
    }


}
