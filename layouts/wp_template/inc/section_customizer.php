<?php

namespace VirgilSecurity;


use VirgilSecurity\Customizer\FeaturesPage\FeaturesPageSectionsCustomizer;

use VirgilSecurity\Customizer\FooterSection\FooterSectionCustomizer;

use VirgilSecurity\Customizer\HeaderSection\HeaderSectionCustomizer;

use VirgilSecurity\Customizer\FrontPage\FrontPageSectionsCustomizer;

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


    public function getFrontPageSections(FrontPageSectionsCustomizer $frontPageSectionsCustomizer)
    {
        $frontPageSectionMods = $this->sectionModifications->getFrontPageSectionMods();

        return [
            $frontPageSectionsCustomizer->getIntroSectionCustomizer()
                                        ->getSection($frontPageSectionMods->getIntroSectionMods()),

            $frontPageSectionsCustomizer->getBenefitsSectionCustomizer()
                                        ->getSection($frontPageSectionMods->getBenefitsSectionMods()),

            $frontPageSectionsCustomizer->getClientsSectionCustomizer()
                                        ->getSection($frontPageSectionMods->getClientsSectionMods()),

            $frontPageSectionsCustomizer->getConclusionSectionCustomizer()
                                        ->getSection($frontPageSectionMods->getConclusionSectionMods()),

            $frontPageSectionsCustomizer->getUseCasesSectionCustomizer()
                                        ->getSection($frontPageSectionMods->getUseCasesSectionMods()),

            $frontPageSectionsCustomizer->getUsageSectionCustomizer()
                                        ->getSection($frontPageSectionMods->getUsageSectionMods()),

            $frontPageSectionsCustomizer->getServicesSectionCustomizer()
                                        ->getSection($frontPageSectionMods->getServicesSectionMods()),
        ];
    }


    public function getFeaturesPageSections(FeaturesPageSectionsCustomizer $featuresPageSectionsCustomizer)
    {
        $featuresPageSectionMods = $this->sectionModifications->getFeaturesPageSectionMods();

        return [
            $featuresPageSectionsCustomizer->getIntroSectionCustomizer()
                                           ->getSection($featuresPageSectionMods->getIntroSectionMods()),

            $featuresPageSectionsCustomizer->getCryptogramSectionCustomizer()
                                           ->getSection($featuresPageSectionMods->getCryptogramSectionMods()),

            $featuresPageSectionsCustomizer->getComponentsSectionCustomizer()
                                           ->getSection($featuresPageSectionMods->getComponentsSectionMods()),
        ];

    }


    public function registerDefaults(WP_Customize_Manager $wpCustomizer)
    {
        $featuresPageSectionsCustomizer = new FeaturesPageSectionsCustomizer($this->config, $wpCustomizer);
        $frontPageSectionsCustomizer = new FrontPageSectionsCustomizer($this->config, $wpCustomizer);

        $this->register(
            [
                $this->getHeaderSection($wpCustomizer),
                $this->getFooterSection($wpCustomizer),
            ]
        );

        $this->register($this->getFrontPageSections($frontPageSectionsCustomizer));
        $this->register($this->getFeaturesPageSections($featuresPageSectionsCustomizer));
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
