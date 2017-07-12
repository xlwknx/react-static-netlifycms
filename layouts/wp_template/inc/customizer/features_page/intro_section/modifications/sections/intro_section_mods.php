<?php

namespace VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\Sections;


use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\IntroHeadlineMod;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\IntroListMod;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\IntroTextMod;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\IntroCryptogramHeadlineMod;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\IntroCryptogramListMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class IntroSectionMods extends BaseSectionMods
{
    protected $IntroHeadlineMod;
    protected $IntroTextMod;
    protected $IntroListMod;
    protected $IntroCryptogramHeadlineMod;
    protected $IntroCryptogramListMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getIntroHeadlineMod(),
                $this->getIntroTextMod(),
                $this->getIntroListMod(),
                $this->getIntroCryptogramHeadlineMod(),
                $this->getIntroCryptogramListMod(),
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
