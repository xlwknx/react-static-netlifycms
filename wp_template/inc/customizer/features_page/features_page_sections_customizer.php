<?php

namespace VirgilSecurity\Customizer\FeaturesPage;


use VirgilSecurity\Customizer\FeaturesPage\ComponentsSection\ComponentsSectionCustomizer;
use VirgilSecurity\Customizer\FeaturesPage\ConclusionSection\ConclusionSectionCustomizer;
use VirgilSecurity\Customizer\FeaturesPage\FaqSection\FaqSectionCustomizer;
use VirgilSecurity\Customizer\FeaturesPage\FeaturesSection\FeaturesSectionCustomizer;
use VirgilSecurity\Customizer\FeaturesPage\CryptogramSection\CryptogramSectionCustomizer;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\IntroSectionCustomizer;

use WP_Customize_Manager;

class FeaturesPageSectionsCustomizer
{
    protected $introSectionCustomizer;
    protected $componentsSectionCustomizer;
    protected $faqSectionCustomizer;
    protected $featuresSectionCustomizer;
    protected $cryptogramSectionCustomizer;
    protected $conclusionSectionCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->introSectionCustomizer = new IntroSectionCustomizer($config, $wpCustomizer);
        $this->componentsSectionCustomizer = new ComponentsSectionCustomizer($config, $wpCustomizer);
        $this->faqSectionCustomizer = new FaqSectionCustomizer($config, $wpCustomizer);
        $this->conclusionSectionCustomizer = new ConclusionSectionCustomizer($config, $wpCustomizer);
        $this->featuresSectionCustomizer = new FeaturesSectionCustomizer($config, $wpCustomizer);
        $this->cryptogramSectionCustomizer = new CryptogramSectionCustomizer($config, $wpCustomizer);
    }


    /**
     * @return IntroSectionCustomizer
     */
    public function getIntroSectionCustomizer()
    {
        return $this->introSectionCustomizer;
    }


    /**
     * @return ComponentsSectionCustomizer
     */
    public function getComponentsSectionCustomizer()
    {
        return $this->componentsSectionCustomizer;
    }


    /**
     * @return FaqSectionCustomizer
     */
    public function getFaqSectionCustomizer()
    {
        return $this->faqSectionCustomizer;
    }


    /**
     * @return FeaturesSectionCustomizer
     */
    public function getFeaturesSectionCustomizer()
    {
        return $this->featuresSectionCustomizer;
    }


    /**
     * @return CryptogramSectionCustomizer
     */
    public function getCryptogramSectionCustomizer()
    {
        return $this->cryptogramSectionCustomizer;
    }


    /**
     * @return ConclusionSectionCustomizer
     */
    public function getConclusionSectionCustomizer()
    {
        return $this->conclusionSectionCustomizer;
    }
}
