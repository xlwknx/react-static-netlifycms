<?php

namespace VirgilSecurity\Customizer\FeaturesPage\ComponentsSection\Modifications\Sections;


use VirgilSecurity\Customizer\FeaturesPage\ComponentsSection\Modifications\ComponentsHeadlineMod;
use VirgilSecurity\Customizer\FeaturesPage\ComponentsSection\Modifications\ComponentsLinksMod;
use VirgilSecurity\Customizer\FeaturesPage\ComponentsSection\Modifications\ComponentsListMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class ComponentsSectionMods extends BaseSectionMods
{
    protected $ComponentsHeadlineMod;
    protected $ComponentsLinksMod;
    protected $ComponentsListMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getComponentsHeadlineMod(),
                $this->getComponentsLinksMod(),
                $this->getComponentsListMod(),
            ]
        );
    }


    public function getComponentsHeadlineMod()
    {
        if ($this->ComponentsHeadlineMod == null) {
            $this->ComponentsHeadlineMod = new ComponentsHeadlineMod();
        }

        return $this->ComponentsHeadlineMod;
    }


    public function getComponentsLinksMod()
    {
        if ($this->ComponentsLinksMod == null) {
            $this->ComponentsLinksMod = new ComponentsLinksMod();
        }

        return $this->ComponentsLinksMod;
    }


    public function getComponentsListMod()
    {
        if ($this->ComponentsListMod == null) {
            $this->ComponentsListMod = new ComponentsListMod();
        }

        return $this->ComponentsListMod;
    }


}
