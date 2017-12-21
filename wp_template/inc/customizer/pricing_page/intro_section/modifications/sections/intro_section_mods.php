<?php

namespace VirgilSecurity\Customizer\PricingPage\IntroSection\Modifications\Sections;


use VirgilSecurity\Customizer\PricingPage\IntroSection\Modifications\IntroHeadlineMod;
use VirgilSecurity\Customizer\PricingPage\IntroSection\Modifications\IntroTextMod;
use VirgilSecurity\Customizer\PricingPage\IntroSection\Modifications\IntroPlansListMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class IntroSectionMods extends BaseSectionMods
{
    protected $IntroHeadlineMod;
    protected $IntroTextMod;
    protected $IntroPlansListMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getIntroHeadlineMod(),
                $this->getIntroTextMod(),
                $this->getIntroPlansListMod(),
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


    public function getIntroPlansListMod()
    {
        if ($this->IntroPlansListMod == null) {
            $this->IntroPlansListMod = new IntroPlansListMod();
        }

        return $this->IntroPlansListMod;
    }


}
