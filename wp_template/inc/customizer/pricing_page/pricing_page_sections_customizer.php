<?php

namespace VirgilSecurity\Customizer\PricingPage;


use VirgilSecurity\Customizer\PricingPage\ConclusionSection\ConclusionSectionCustomizer;
use VirgilSecurity\Customizer\PricingPage\EnterpriseSection\EnterpriseSectionCustomizer;
use VirgilSecurity\Customizer\PricingPage\IncludesSection\IncludesSectionCustomizer;
use VirgilSecurity\Customizer\PricingPage\IntroSection\IntroSectionCustomizer;

use WP_Customize_Manager;

class PricingPageSectionsCustomizer
{
    protected $introSectionCustomizer;
    protected $enterpriseSectionCustomizer;
    protected $includesSectionCustomizer;
    protected $conclusionSectionCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->introSectionCustomizer = new IntroSectionCustomizer($config, $wpCustomizer);
        $this->enterpriseSectionCustomizer = new EnterpriseSectionCustomizer($config, $wpCustomizer);
        $this->includesSectionCustomizer = new IncludesSectionCustomizer($config, $wpCustomizer);
        $this->conclusionSectionCustomizer = new ConclusionSectionCustomizer($config, $wpCustomizer);
    }


    /**
     * @return IntroSectionCustomizer
     */
    public function getIntroSectionCustomizer()
    {
        return $this->introSectionCustomizer;
    }


    /**
     * @return EnterpriseSectionCustomizer
     */
    public function getEnterpriseSectionCustomizer()
    {
        return $this->enterpriseSectionCustomizer;
    }


    /**
     * @return IncludesSectionCustomizer
     */
    public function getIncludesSectionCustomizer()
    {
        return $this->includesSectionCustomizer;
    }


    /**
     * @return ConclusionSectionCustomizer
     */
    public function getConclusionSectionCustomizer()
    {
        return $this->conclusionSectionCustomizer;
    }
}
