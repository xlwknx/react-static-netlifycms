<?php

namespace VirgilSecurity\Customizer\PricingPage;


use VirgilSecurity\Customizer\PricingPage\ConclusionSection\Modifications\Sections\ConclusionSectionMods;
use VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Modifications\Sections\EnterpriseSectionMods;
use VirgilSecurity\Customizer\PricingPage\IncludesSection\Modifications\Sections\IncludesSectionMods;
use VirgilSecurity\Customizer\PricingPage\IntroSection\Modifications\Sections\IntroSectionMods;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class PricingPageSectionMods extends BaseSectionMods
{
    protected $introSectionMods;
    protected $enterpriseSectionMods;
    protected $includesSectionMods;
    protected $conclusionSectionMods;


    public function __construct()
    {
        $this->introSectionMods = new IntroSectionMods();
        $this->enterpriseSectionMods = new EnterpriseSectionMods();
        $this->includesSectionMods = new IncludesSectionMods();
        $this->conclusionSectionMods = new ConclusionSectionMods();
    }


    public function setupDefaults()
    {
        $this->introSectionMods->setupDefaults();
        $this->enterpriseSectionMods->setupDefaults();
        $this->includesSectionMods->setupDefaults();
        $this->conclusionSectionMods->setupDefaults();
    }


    /**
     * @return IntroSectionMods
     */
    public function getIntroSectionMods()
    {
        return $this->introSectionMods;
    }


    /**
     * @return EnterpriseSectionMods
     */
    public function getEnterpriseSectionMods()
    {
        return $this->enterpriseSectionMods;
    }


    /**
     * @return IncludesSectionMods
     */
    public function getIncludesSectionMods()
    {
        return $this->includesSectionMods;
    }


    /**
     * @return ConclusionSectionMods
     */
    public function getConclusionSectionMods()
    {
        return $this->conclusionSectionMods;
    }

}
