<?php

namespace VirgilSecurity\Customizer\FrontPage;


use VirgilSecurity\Customizer\FrontPage\BenefitsSection\BenefitsSectionCustomizer;
use VirgilSecurity\Customizer\FrontPage\ClientsSection\ClientsSectionCustomizer;
use VirgilSecurity\Customizer\FrontPage\ConclusionSection\ConclusionSectionCustomizer;
use VirgilSecurity\Customizer\FrontPage\IntroSection\IntroSectionCustomizer;
use VirgilSecurity\Customizer\FrontPage\ServicesSection\ServicesSectionCustomizer;
use VirgilSecurity\Customizer\FrontPage\UsageSection\UsageSectionCustomizer;
use VirgilSecurity\Customizer\FrontPage\UseCasesSection\UseCasesSectionCustomizer;

use WP_Customize_Manager;

class FrontPageSectionsCustomizer
{
    protected $introSectionCustomizer;
    protected $benefitsSectionCustomizer;
    protected $clientsSectionCustomizer;
    protected $conclusionSectionCustomizer;
    protected $servicesSectionCustomizer;
    protected $usageSectionCustomizer;
    protected $useCasesSectionCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->introSectionCustomizer = new IntroSectionCustomizer($config, $wpCustomizer);
        $this->benefitsSectionCustomizer = new BenefitsSectionCustomizer($config, $wpCustomizer);
        $this->clientsSectionCustomizer = new ClientsSectionCustomizer($config, $wpCustomizer);
        $this->conclusionSectionCustomizer = new ConclusionSectionCustomizer($config, $wpCustomizer);
        $this->servicesSectionCustomizer = new ServicesSectionCustomizer($config, $wpCustomizer);
        $this->usageSectionCustomizer = new UsageSectionCustomizer($config, $wpCustomizer);
        $this->useCasesSectionCustomizer = new UseCasesSectionCustomizer($config, $wpCustomizer);

    }


    /**
     * @return IntroSectionCustomizer
     */
    public function getIntroSectionCustomizer()
    {
        return $this->introSectionCustomizer;
    }


    /**
     * @return BenefitsSectionCustomizer
     */
    public function getBenefitsSectionCustomizer()
    {
        return $this->benefitsSectionCustomizer;
    }


    /**
     * @return ClientsSectionCustomizer
     */
    public function getClientsSectionCustomizer()
    {
        return $this->clientsSectionCustomizer;
    }


    /**
     * @return ConclusionSectionCustomizer
     */
    public function getConclusionSectionCustomizer()
    {
        return $this->conclusionSectionCustomizer;
    }


    /**
     * @return ServicesSectionCustomizer
     */
    public function getServicesSectionCustomizer()
    {
        return $this->servicesSectionCustomizer;
    }


    /**
     * @return UsageSectionCustomizer
     */
    public function getUsageSectionCustomizer()
    {
        return $this->usageSectionCustomizer;
    }


    /**
     * @return UseCasesSectionCustomizer
     */
    public function getUseCasesSectionCustomizer()
    {
        return $this->useCasesSectionCustomizer;
    }

}
