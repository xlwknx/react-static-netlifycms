<?php

namespace VirgilSecurity\Customizer\FrontPage;


use VirgilSecurity\Customizer\FrontPage\IntroSection\Modifications\Sections\IntroSectionMods;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class FrontPageSectionMods extends BaseSectionMods
{
    /** @var IntroSectionMods */
    protected $introSectionMods;


    public function __construct()
    {
        $this->introSectionMods = new IntroSectionMods();
    }


    public function getIntroSectionMods()
    {
        return $this->introSectionMods;
    }


    public function setupDefaults()
    {
        $this->introSectionMods->setupDefaults();
    }
}
