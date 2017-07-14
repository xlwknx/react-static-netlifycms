<?php

namespace VirgilSecurity\Models\PricingPage;


use VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Modifications\Sections\EnterpriseSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class EnterpriseSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_pricing_page_enterprise_section';

    /** @var EnterpriseSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new EnterpriseSectionMods();
    }


    public function Title()
    {
        $mod = $this->sectionMods->getEnterpriseTitleMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Text()
    {
        $mod = $this->sectionMods->getEnterpriseTextMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Image()
    {
        $mod = $this->sectionMods->getEnterpriseImageMod();

        if ($mod->isEnabled()) {
            return $this->imageModValueToModel($mod->getValue());
        }
    }


    public function Links()
    {
        $mod = $this->sectionMods->getEnterpriseLinksMod();

        if ($mod->isEnabled()) {
            return $this->filterCollection($mod->getValue());
        }
    }


    public function Collection()
    {
        $mod = $this->sectionMods->getEnterpriseListMod();

        if ($mod->isEnabled()) {
            return $this->filterCollection($mod->getValue());
        }
    }
}
