<?php

namespace VirgilSecurity\Customizer\FeaturesPage;


use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\Sections\IntroSectionMods;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class FeaturesPageSectionMods extends BaseSectionMods
{
    protected $introSectionMods;


    public function __construct()
    {
        $this->introSectionMods = new IntroSectionMods();
    }


    public function setupDefaults()
    {
        $this->introSectionMods->setupDefaults();
    }


    /**
     * @return IntroSectionMods
     */
    public function getIntroSectionMods()
    {
        return $this->introSectionMods;
    }
}
