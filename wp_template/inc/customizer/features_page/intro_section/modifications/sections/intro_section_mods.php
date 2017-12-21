<?php

namespace VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\Sections;


use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\IntroHeadlineMod;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\IntroListMod;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\IntroTextMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class IntroSectionMods extends BaseSectionMods
{
    protected $IntroHeadlineMod;
    protected $IntroTextMod;
    protected $IntroListMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getIntroHeadlineMod(),
                $this->getIntroTextMod(),
                $this->getIntroListMod(),
            ]
        );
    }


    public function getIntroHeadlineMod()
    {
        if ($this->IntroHeadlineMod == null) {
            $this->IntroHeadlineMod = new IntroHeadlineMod();
        }

        return $this->IntroHeadlineMod;
    }


    public function getIntroTextMod()
    {
        if ($this->IntroTextMod == null) {
            $this->IntroTextMod = new IntroTextMod();
        }

        return $this->IntroTextMod;
    }


    public function getIntroListMod()
    {
        if ($this->IntroListMod == null) {
            $this->IntroListMod = new IntroListMod();
        }

        return $this->IntroListMod;
    }
}
