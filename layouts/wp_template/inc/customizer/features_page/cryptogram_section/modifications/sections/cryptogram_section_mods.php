<?php

namespace VirgilSecurity\Customizer\FeaturesPage\CryptogramSection\Modifications\Sections;


use VirgilSecurity\Customizer\FeaturesPage\CryptogramSection\Modifications\CryptogramHeadlineMod;
use VirgilSecurity\Customizer\FeaturesPage\CryptogramSection\Modifications\CryptogramListMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class CryptogramSectionMods extends BaseSectionMods
{
    protected $CryptogramHeadlineMod;
    protected $CryptogramListMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getCryptogramHeadlineMod(),
                $this->getCryptogramListMod(),
            ]
        );
    }


    public function getCryptogramHeadlineMod()
    {
        if ($this->CryptogramHeadlineMod == null) {
            $this->CryptogramHeadlineMod = new CryptogramHeadlineMod();
        }

        return $this->CryptogramHeadlineMod;
    }


    public function getCryptogramListMod()
    {
        if ($this->CryptogramListMod == null) {
            $this->CryptogramListMod = new CryptogramListMod();
        }

        return $this->CryptogramListMod;
    }


}
