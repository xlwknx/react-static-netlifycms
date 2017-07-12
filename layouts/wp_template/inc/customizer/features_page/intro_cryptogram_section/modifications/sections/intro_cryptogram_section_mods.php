<?php

namespace VirgilSecurity\Customizer\FeaturesPage\IntroCryptogramSection\Modifications\Sections;


use VirgilSecurity\Customizer\FeaturesPage\IntroCryptogramSection\Modifications\IntroCryptogramHeadlineMod;
use VirgilSecurity\Customizer\FeaturesPage\IntroCryptogramSection\Modifications\IntroCryptogramTextMod;
use VirgilSecurity\Customizer\FeaturesPage\IntroCryptogramSection\Modifications\IntroCryptogramListMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class IntroCryptogramSectionMods extends BaseSectionMods
{
    protected $IntroCryptogramHeadlineMod;
    protected $IntroCryptogramTextMod;
    protected $IntroCryptogramListMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getIntroCryptogramHeadlineMod(),
                $this->getIntroCryptogramTextMod(),
                $this->getIntroCryptogramListMod(),
            ]
        );
    }


    public function getIntroCryptogramHeadlineMod()
    {
        if ($this->IntroCryptogramHeadlineMod == null) {
            $this->IntroCryptogramHeadlineMod = new IntroCryptogramHeadlineMod();
        }

        return $this->IntroCryptogramHeadlineMod;
    }


    public function getIntroCryptogramTextMod()
    {
        if ($this->IntroCryptogramTextMod == null) {
            $this->IntroCryptogramTextMod = new IntroCryptogramTextMod();
        }

        return $this->IntroCryptogramTextMod;
    }


    public function getIntroCryptogramListMod()
    {
        if ($this->IntroCryptogramListMod == null) {
            $this->IntroCryptogramListMod = new IntroCryptogramListMod();
        }

        return $this->IntroCryptogramListMod;
    }


}
