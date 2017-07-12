<?php

namespace VirgilSecurity\Customizer\FeaturesPage;


use VirgilSecurity\Customizer\FeaturesPage\CryptogramSection\Modifications\Sections\CryptogramSectionMods;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\Sections\IntroSectionMods;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class FeaturesPageSectionMods extends BaseSectionMods
{
    protected $introSectionMods;
    protected $cryptogramSectionMods;


    public function __construct()
    {
        $this->introSectionMods = new IntroSectionMods();
        $this->cryptogramSectionMods = new CryptogramSectionMods();
    }


    public function setupDefaults()
    {
        $this->introSectionMods->setupDefaults();
        $this->cryptogramSectionMods->setupDefaults();
    }


    /**
     * @return IntroSectionMods
     */
    public function getIntroSectionMods()
    {
        return $this->introSectionMods;
    }


    /**
     * @return CryptogramSectionMods
     */
    public function getCryptogramSectionMods()
    {
        return $this->cryptogramSectionMods;
    }
}
