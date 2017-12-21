<?php

namespace VirgilSecurity\Customizer\PricingPage\ConclusionSection\Modifications\Sections;


use VirgilSecurity\Customizer\PricingPage\ConclusionSection\Modifications\ConclusionHeadlineMod;
use VirgilSecurity\Customizer\PricingPage\ConclusionSection\Modifications\ConclusionLinksMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class ConclusionSectionMods extends BaseSectionMods
{
    protected $ConclusionHeadlineMod;
    protected $ConclusionLinksMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getConclusionHeadlineMod(),
                $this->getConclusionLinksMod(),
            ]
        );
    }


    public function getConclusionHeadlineMod()
    {
        if ($this->ConclusionHeadlineMod == null) {
            $this->ConclusionHeadlineMod = new ConclusionHeadlineMod();
        }

        return $this->ConclusionHeadlineMod;
    }


    public function getConclusionLinksMod()
    {
        if ($this->ConclusionLinksMod == null) {
            $this->ConclusionLinksMod = new ConclusionLinksMod();
        }

        return $this->ConclusionLinksMod;
    }


}
