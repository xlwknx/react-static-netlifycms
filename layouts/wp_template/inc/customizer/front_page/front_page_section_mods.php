<?php

namespace VirgilSecurity\Customizer\FrontPage;


use VirgilSecurity\Customizer\FrontPage\IntroSection\Modifications\Sections\IntroSectionMods;

use VirgilSecurity\Customizer\FrontPage\UseCasesSection\Modifications\Sections\UseCasesSectionMods;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class FrontPageSectionMods extends BaseSectionMods
{
    /** @var IntroSectionMods */
    protected $introSectionMods;

    /** @var UseCasesSectionMods */
    protected $useCasesSectionMods;


    public function __construct()
    {
        $this->introSectionMods = new IntroSectionMods();
        $this->useCasesSectionMods = new UseCasesSectionMods();
    }


    public function getUseCasesSectionMods()
    {
        return $this->useCasesSectionMods;
    }


    public function getIntroSectionMods()
    {
        return $this->introSectionMods;
    }


    public function setupDefaults()
    {
        $this->introSectionMods->setupDefaults();
        $this->useCasesSectionMods->setupDefaults();
    }
}
