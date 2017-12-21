<?php

namespace VirgilSecurity\Customizer\FrontPage\ConclusionSection\Modifications\Sections;


use VirgilSecurity\Customizer\FrontPage\ConclusionSection\Modifications\ConclusionHeadlineMod;
use VirgilSecurity\Customizer\FrontPage\ConclusionSection\Modifications\ConclusionTextMod;
use VirgilSecurity\Customizer\FrontPage\ConclusionSection\Modifications\ConclusionLinksListMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class ConclusionSectionMods extends BaseSectionMods
{
    protected $ConclusionHeadlineMod;
    protected $ConclusionTextMod;
    protected $ConclusionLinksListMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getConclusionHeadlineMod(),
                $this->getConclusionTextMod(),
                $this->getConclusionLinksListMod(),
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


    public function getConclusionTextMod()
    {
        if ($this->ConclusionTextMod == null) {
            $this->ConclusionTextMod = new ConclusionTextMod();
        }

        return $this->ConclusionTextMod;
    }


    public function getConclusionLinksListMod()
    {
        if ($this->ConclusionLinksListMod == null) {
            $this->ConclusionLinksListMod = new ConclusionLinksListMod();
        }

        return $this->ConclusionLinksListMod;
    }


}
