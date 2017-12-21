<?php

namespace VirgilSecurity\Customizer\PricingPage\IncludesSection\Modifications\Sections;


use VirgilSecurity\Customizer\PricingPage\IncludesSection\Modifications\IncludesHeadlineMod;
use VirgilSecurity\Customizer\PricingPage\IncludesSection\Modifications\IncludesTextMod;
use VirgilSecurity\Customizer\PricingPage\IncludesSection\Modifications\IncludesListMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class IncludesSectionMods extends BaseSectionMods
{
    protected $IncludesHeadlineMod;
    protected $IncludesTextMod;
    protected $IncludesListMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getIncludesHeadlineMod(),
                $this->getIncludesTextMod(),
                $this->getIncludesListMod(),
            ]
        );
    }


    public function getIncludesHeadlineMod()
    {
        if ($this->IncludesHeadlineMod == null) {
            $this->IncludesHeadlineMod = new IncludesHeadlineMod();
        }

        return $this->IncludesHeadlineMod;
    }


    public function getIncludesTextMod()
    {
        if ($this->IncludesTextMod == null) {
            $this->IncludesTextMod = new IncludesTextMod();
        }

        return $this->IncludesTextMod;
    }


    public function getIncludesListMod()
    {
        if ($this->IncludesListMod == null) {
            $this->IncludesListMod = new IncludesListMod();
        }

        return $this->IncludesListMod;
    }


}
