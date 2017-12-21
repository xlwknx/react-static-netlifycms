<?php

namespace VirgilSecurity\Customizer\FeaturesPage;


use VirgilSecurity\Customizer\FeaturesPage\ComponentsSection\Modifications\Sections\ComponentsSectionMods;
use VirgilSecurity\Customizer\FeaturesPage\ConclusionSection\Modifications\Sections\ConclusionSectionMods;
use VirgilSecurity\Customizer\FeaturesPage\CryptogramSection\Modifications\Sections\CryptogramSectionMods;
use VirgilSecurity\Customizer\FeaturesPage\FaqSection\Modifications\Sections\FaqSectionMods;
use VirgilSecurity\Customizer\FeaturesPage\FeaturesSection\Modifications\Sections\FeaturesSectionMods;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\Sections\IntroSectionMods;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class FeaturesPageSectionMods extends BaseSectionMods
{
    protected $introSectionMods;
    protected $cryptogramSectionMods;
    protected $componentsSectionMods;
    protected $featuresSectionMods;
    protected $faqSectionMods;
    protected $conclusionSectionMods;


    public function __construct()
    {
        $this->introSectionMods = new IntroSectionMods();
        $this->cryptogramSectionMods = new CryptogramSectionMods();
        $this->componentsSectionMods = new ComponentsSectionMods();
        $this->featuresSectionMods = new FeaturesSectionMods();
        $this->faqSectionMods = new FaqSectionMods();
        $this->conclusionSectionMods = new ConclusionSectionMods();
    }


    public function setupDefaults()
    {
        $this->introSectionMods->setupDefaults();
        $this->cryptogramSectionMods->setupDefaults();
        $this->componentsSectionMods->setupDefaults();
        $this->featuresSectionMods->setupDefaults();
        $this->faqSectionMods->setupDefaults();
    }


    /**
     * @return IntroSectionMods
     */
    public function getIntroSectionMods()
    {
        return $this->introSectionMods;
    }


    /**
     * @return CryptogramSectionMods
     */
    public function getCryptogramSectionMods()
    {
        return $this->cryptogramSectionMods;
    }


    /**
     * @return ComponentsSectionMods
     */
    public function getComponentsSectionMods()
    {
        return $this->componentsSectionMods;
    }


    /**
     * @return FeaturesSectionMods
     */
    public function getFeaturesSectionMods()
    {
        return $this->featuresSectionMods;
    }


    /**
     * @return FaqSectionMods
     */
    public function getFaqSectionMods()
    {
        return $this->faqSectionMods;
    }


    /**
     * @return ConclusionSectionMods
     */
    public function getConclusionSectionMods()
    {
        return $this->conclusionSectionMods;
    }
}
