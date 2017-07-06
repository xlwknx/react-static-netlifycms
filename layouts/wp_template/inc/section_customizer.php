<?php

namespace VirgilSecurity;


use VirgilSecurity\Customizer\HeaderSection\Fields\LogoImageField;
use VirgilSecurity\Customizer\HeaderSection\Fields\MenuCodeField;

use VirgilSecurity\Customizer\HeaderSection\Groups\AuthLinksGroup;

use VirgilSecurity\Customizer\HeaderSection\HeaderSection;

use VirgilSecurity\Customizer\FrontPage\IntroSection\Fields\IntroMsgField;
use VirgilSecurity\Customizer\FrontPage\IntroSection\Groups\IntroLangsGroup;
use VirgilSecurity\Customizer\FrontPage\IntroSection\IntroSection;
use VirgilSecurity\Customizer\FrontPage\IntroSection\Groups\IntroLinksGroup;
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
                $this->getFrontPageIntroSection($wpCustomizer),
            ]
        );
    }


    public function getHeaderSection(WP_Customize_Manager $wpCustomizer)
    {

        $section = new HeaderSection($this->config, $wpCustomizer);

        $section->addField(
            LogoImageField::createWithMod(
                $this->sectionModifications->getHeaderSectionMods()
                                           ->getLogoImageMod()
            )
        );

        $section->addField(
            MenuCodeField::createWithMod(
                $this->sectionModifications->getHeaderSectionMods()
                                           ->getMenuCodeMod()
            )
        );
        $section->addField(
            AuthLinksGroup::createWithMod(
                $this->sectionModifications->getHeaderSectionMods()
                                           ->getAuthLinksMod()
            )
        );

        return $section;
    }


    public function getFrontPageIntroSection(WP_Customize_Manager $wpCustomizer)
    {
        $section = new IntroSection($this->config, $wpCustomizer);

        $section->addField(
            IntroMsgField::createWithMod(
                $this->sectionModifications->getFrontPageSectionMods()
                                           ->getIntroSectionMods()
                                           ->getIntroMsgMod()
            )
        );

        $section->addField(
            IntroLinksGroup::createWithMod(
                $this->sectionModifications->getFrontPageSectionMods()
                                           ->getIntroSectionMods()
                                           ->getIntroLinksMod()
            )
        );

        $section->addField(
            IntroLangsGroup::createWithMod(
                $this->sectionModifications->getFrontPageSectionMods()
                                           ->getIntroSectionMods()
                                           ->getIntroLangsMod()
            )
        );

        return $section;
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
