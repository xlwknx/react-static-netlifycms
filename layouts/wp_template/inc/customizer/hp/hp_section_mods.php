<?php
namespace VirgilSecurity\Customizer\Hp;


use VirgilSecurity\Customizer\Hp\IntroSection\Modifications\Sections\IntroSectionMods;
use VirgilSecurity\Customizer\Src\BaseSectionMods;

class HpSectionMods extends BaseSectionMods
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
