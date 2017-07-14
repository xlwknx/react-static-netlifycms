<?php

namespace VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Modifications\Sections;


use VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Modifications\EnterpriseImageMod;
use VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Modifications\EnterpriseTitleMod;
use VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Modifications\EnterpriseTextMod;
use VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Modifications\EnterpriseListMod;
use VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Modifications\EnterpriseLinksMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class EnterpriseSectionMods extends BaseSectionMods
{
    protected $EnterpriseImageMod;
    protected $EnterpriseTitleMod;
    protected $EnterpriseTextMod;
    protected $EnterpriseListMod;
    protected $EnterpriseLinksMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getEnterpriseImageMod(),
                $this->getEnterpriseTitleMod(),
                $this->getEnterpriseTextMod(),
                $this->getEnterpriseListMod(),
                $this->getEnterpriseLinksMod(),
            ]
        );
    }


    public function getEnterpriseImageMod()
    {
        if ($this->EnterpriseImageMod == null) {
            $this->EnterpriseImageMod = new EnterpriseImageMod();
        }

        return $this->EnterpriseImageMod;
    }


    public function getEnterpriseTitleMod()
    {
        if ($this->EnterpriseTitleMod == null) {
            $this->EnterpriseTitleMod = new EnterpriseTitleMod();
        }

        return $this->EnterpriseTitleMod;
    }


    public function getEnterpriseTextMod()
    {
        if ($this->EnterpriseTextMod == null) {
            $this->EnterpriseTextMod = new EnterpriseTextMod();
        }

        return $this->EnterpriseTextMod;
    }


    public function getEnterpriseListMod()
    {
        if ($this->EnterpriseListMod == null) {
            $this->EnterpriseListMod = new EnterpriseListMod();
        }

        return $this->EnterpriseListMod;
    }


    public function getEnterpriseLinksMod()
    {
        if ($this->EnterpriseLinksMod == null) {
            $this->EnterpriseLinksMod = new EnterpriseLinksMod();
        }

        return $this->EnterpriseLinksMod;
    }


}
