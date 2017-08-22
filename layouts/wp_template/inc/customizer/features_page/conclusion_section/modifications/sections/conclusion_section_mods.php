<?php

namespace VirgilSecurity\Customizer\FeaturesPage\ConclusionSection\Modifications\Sections;


use VirgilSecurity\Customizer\FeaturesPage\ConclusionSection\Modifications\ConclusionHeadlineMod;
use VirgilSecurity\Customizer\FeaturesPage\ConclusionSection\Modifications\ConclusionLinksMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class ConclusionSectionMods extends BaseSectionMods
{
    protected $conclusionHeadlineMod;
    protected $conclusionLinksMod;


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
        if ($this->conclusionHeadlineMod == null) {
            $this->conclusionHeadlineMod = new ConclusionHeadlineMod();
        }

        return $this->conclusionHeadlineMod;
    }


    public function getConclusionLinksMod()
    {
        if ($this->conclusionLinksMod == null) {
            $this->conclusionLinksMod = new ConclusionLinksMod();
        }

        return $this->conclusionLinksMod;
    }


}
