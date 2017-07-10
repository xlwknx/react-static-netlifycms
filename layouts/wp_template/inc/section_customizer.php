<?php

namespace VirgilSecurity;


use VirgilSecurity\Customizer\FooterSection\FooterSectionCustomizer;


use VirgilSecurity\Customizer\FrontPage\IntroSection\IntroSectionCustomizer;
use VirgilSecurity\Customizer\FrontPage\ServicesSection\ServicesSectionCustomizer;
use VirgilSecurity\Customizer\FrontPage\UseCasesSection\UseCasesSectionCustomizer;
use VirgilSecurity\Customizer\HeaderSection\HeaderSectionCustomizer;
use VirgilSecurity\Customizer\Src\ConfigInterface;
use VirgilSecurity\Customizer\Src\SectionInterface;

use WP_Customize_Manager;

class SectionCustomizer
{
    private $config;

    private $sectionModifications;


    public function __construct(ConfigInterface $config, SectionModifications $sectionModifications)
    {

        $this->config = $config;
        $this->sectionModifications = $sectionModifications;
    }


    public function registerDefaults(WP_Customize_Manager $wpCustomizer)
    {
        $this->register(
            [
                $this->getHeaderSection($wpCustomizer),
                $this->getFooterSection($wpCustomizer),

                $this->getFrontPageIntroSection($wpCustomizer),
                $this->getFrontPageUseCasesSection($wpCustomizer),
                $this->getFrontPageServicesSection($wpCustomizer),
            ]
        );
    }


    public function getFooterSection(WP_Customize_Manager $wpCustomizer)
    {
        $footerSectionCustomizer = new FooterSectionCustomizer($this->config, $wpCustomizer);

        return $footerSectionCustomizer->getSection($this->sectionModifications->getFooterSectionMods());
    }


    public function getHeaderSection(WP_Customize_Manager $wpCustomizer)
    {
        $headerSectionCustomizer = new HeaderSectionCustomizer($this->config, $wpCustomizer);

        return $headerSectionCustomizer->getSection($this->sectionModifications->getHeaderSectionMods());
    }


    public function getFrontPageIntroSection(WP_Customize_Manager $wpCustomizer)
    {
        $introSectionCustomizer = new IntroSectionCustomizer($this->config, $wpCustomizer);

        return $introSectionCustomizer->getSection(
            $this->sectionModifications->getFrontPageSectionMods()
                                       ->getIntroSectionMods()
        );
    }


    public function getFrontPageUseCasesSection(WP_Customize_Manager $wpCustomizer)
    {
        $useCasesSectionCustomizer = new UseCasesSectionCustomizer($this->config, $wpCustomizer);

        return $useCasesSectionCustomizer->getSection(
            $this->sectionModifications->getFrontPageSectionMods()
                                       ->getUseCasesSectionMods()
        );
    }


    public function getFrontPageServicesSection(WP_Customize_Manager $wpCustomizer)
    {
        $servicesSectionCustomizer = new ServicesSectionCustomizer($this->config, $wpCustomizer);

        return $servicesSectionCustomizer->getSection(
            $this->sectionModifications->getFrontPageSectionMods()
                                       ->getServicesSectionMods()
        );
    }


    /**
     * @param $sections SectionInterface[]
     */
    protected function register($sections)
    {
        foreach ($sections as $section) {
            $section->registerSection();
        }
    }
}
