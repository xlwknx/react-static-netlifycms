<?php

namespace VirgilSecurity\Customizer\FrontPage;


use VirgilSecurity\Customizer\FrontPage\BenefitsSection\Modifications\Sections\BenefitsSectionMods;
use VirgilSecurity\Customizer\FrontPage\ClientsSection\Modifications\Sections\ClientsSectionMods;
use VirgilSecurity\Customizer\FrontPage\ConclusionSection\Modifications\Sections\ConclusionSectionMods;
use VirgilSecurity\Customizer\FrontPage\IntroSection\Modifications\Sections\IntroSectionMods;

use VirgilSecurity\Customizer\FrontPage\ServicesSection\Modifications\Sections\ServicesSectionMods;
use VirgilSecurity\Customizer\FrontPage\UsageSection\Modifications\Sections\UsageSectionMods;
use VirgilSecurity\Customizer\FrontPage\UseCasesSection\Modifications\Sections\UseCasesSectionMods;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class FrontPageSectionMods extends BaseSectionMods
{
    /** @var IntroSectionMods */
    protected $introSectionMods;

    /** @var UseCasesSectionMods */
    protected $useCasesSectionMods;

    /** @var ServicesSectionMods */
    protected $servicesSectionMods;

    /** @var ClientsSectionMods */
    protected $clientsSectionMods;

    /** @var UsageSectionMods */
    protected $usageSectionMods;

    /** @var BenefitsSectionMods */
    protected $benefitsSectionMods;

    /** @var ConclusionSectionMods */
    protected $conclusionSectionMods;


    public function __construct()
    {
        $this->introSectionMods = new IntroSectionMods();
        $this->useCasesSectionMods = new UseCasesSectionMods();
        $this->servicesSectionMods = new ServicesSectionMods();
        $this->clientsSectionMods = new ClientsSectionMods();
        $this->usageSectionMods = new UsageSectionMods();
        $this->benefitsSectionMods = new BenefitsSectionMods();
        $this->conclusionSectionMods = new ConclusionSectionMods();
    }


    public function getUseCasesSectionMods()
    {
        return $this->useCasesSectionMods;
    }


    public function getServicesSectionMods()
    {
        return $this->servicesSectionMods;
    }


    public function getClientsSectionMods()
    {
        return $this->clientsSectionMods;
    }


    public function getIntroSectionMods()
    {
        return $this->introSectionMods;
    }


    public function getUsageSectionMods()
    {
        return $this->usageSectionMods;
    }


    public function getBenefitsSectionMods()
    {
        return $this->benefitsSectionMods;
    }


    public function getConclusionSectionMods()
    {
        return $this->conclusionSectionMods;
    }


    public function setupDefaults()
    {
        $this->introSectionMods->setupDefaults();
        $this->useCasesSectionMods->setupDefaults();
        $this->servicesSectionMods->setupDefaults();
        $this->usageSectionMods->setupDefaults();
        $this->benefitsSectionMods->setupDefaults();
        $this->conclusionSectionMods->setupDefaults();
    }
}
