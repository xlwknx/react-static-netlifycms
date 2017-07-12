<?php

namespace VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\Sections;


use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\IntroIntroHeadlineMod;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\IntroIntroTextMod;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\IntroIntroListMod;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\IntroCryptogramHeadlineMod;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\IntroCryptogramListMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class IntroSectionMods extends BaseSectionMods
{
    protected $IntroIntroHeadlineMod;
    protected $IntroIntroTextMod;
    protected $IntroIntroListMod;
    protected $IntroCryptogramHeadlineMod;
    protected $IntroCryptogramListMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getIntroIntroHeadlineMod(),
                $this->getIntroIntroTextMod(),
                $this->getIntroIntroListMod(),
                $this->getIntroCryptogramHeadlineMod(),
                $this->getIntroCryptogramListMod(),
            ]
        );
    }


    public function getIntroIntroHeadlineMod()
    {
        if ($this->IntroIntroHeadlineMod == null) {
            $this->IntroIntroHeadlineMod = new IntroIntroHeadlineMod();
        }

        return $this->IntroIntroHeadlineMod;
    }


    public function getIntroIntroTextMod()
    {
        if ($this->IntroIntroTextMod == null) {
            $this->IntroIntroTextMod = new IntroIntroTextMod();
        }

        return $this->IntroIntroTextMod;
    }


    public function getIntroIntroListMod()
    {
        if ($this->IntroIntroListMod == null) {
            $this->IntroIntroListMod = new IntroIntroListMod();
        }

        return $this->IntroIntroListMod;
    }


    public function getIntroCryptogramHeadlineMod()
    {
        if ($this->IntroCryptogramHeadlineMod == null) {
            $this->IntroCryptogramHeadlineMod = new IntroCryptogramHeadlineMod();
        }

        return $this->IntroCryptogramHeadlineMod;
    }


    public function getIntroCryptogramListMod()
    {
        if ($this->IntroCryptogramListMod == null) {
            $this->IntroCryptogramListMod = new IntroCryptogramListMod();
        }

        return $this->IntroCryptogramListMod;
    }


}
