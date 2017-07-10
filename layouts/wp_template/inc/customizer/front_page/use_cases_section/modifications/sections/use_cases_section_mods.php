<?php

namespace VirgilSecurity\Customizer\FrontPage\UseCasesSection\Modifications\Sections;


use VirgilSecurity\Customizer\FrontPage\UseCasesSection\Modifications\UseCasesHeadlineMod;
use VirgilSecurity\Customizer\FrontPage\UseCasesSection\Modifications\UseCasesLinksMod;
use VirgilSecurity\Customizer\FrontPage\UseCasesSection\Modifications\UseCasesListCaptionMod;
use VirgilSecurity\Customizer\FrontPage\UseCasesSection\Modifications\UseCasesTextMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class UseCasesSectionMods extends BaseSectionMods
{
    protected $useCasesHeadlineMod;
    protected $useCasesTextMod;
    protected $useCasesLinksMod;
    protected $useCasesListCaptionMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getUseCasesHeadlineMod(),
                $this->getUseCasesTextMod(),
                $this->getUseCasesLinksMod(),
                $this->getUseCasesListCaptionMod(),
            ]
        );
    }


    public function getUseCasesListCaptionMod()
    {
        if ($this->useCasesListCaptionMod == null) {
            $this->useCasesListCaptionMod = new UseCasesListCaptionMod();
        }

        return $this->useCasesListCaptionMod;
    }


    public function getUseCasesLinksMod()
    {
        if ($this->useCasesLinksMod == null) {
            $this->useCasesLinksMod = new UseCasesLinksMod();
        }

        return $this->useCasesLinksMod;
    }


    public function getUseCasesHeadlineMod()
    {
        if ($this->useCasesHeadlineMod == null) {
            $this->useCasesHeadlineMod = new UseCasesHeadlineMod();
        }

        return $this->useCasesHeadlineMod;
    }


    public function getUseCasesTextMod()
    {
        if ($this->useCasesTextMod == null) {
            $this->useCasesTextMod = new UseCasesTextMod();
        }

        return $this->useCasesTextMod;
    }

}
