<?php
namespace VirgilSecurity;


use Kirki;
use VirgilSecurity\Customizer\Fields\TextField;
use VirgilSecurity\Customizer\HeaderSection\Fields\LogoImageField;
use VirgilSecurity\Customizer\HeaderSection\Fields\MenuCodeField;

use VirgilSecurity\Customizer\HeaderSection\Groups\AuthLinksGroup;

use VirgilSecurity\Customizer\HeaderSection\HeaderSection;

use VirgilSecurity\Customizer\Hp\IntroSection\Fields\IntroMsgField;
use VirgilSecurity\Customizer\Hp\IntroSection\IntroSection;
use VirgilSecurity\Customizer\Hp\IntroSection\Groups\IntroLinksGroup;
use VirgilSecurity\Customizer\Src\ConfigInterface;
use VirgilSecurity\Customizer\Src\SectionInterface;

use VirgilSecurity\Customizer\VirgilSecurityConfig;

class SectionCustomizer
{
    private $config;

    private $sectionModifications;


    public function __construct(ConfigInterface $config, SectionModifications $sectionModifications)
    {

        $this->config = $config;
        $this->sectionModifications = $sectionModifications;
    }


    public function registerDefaults()
    {
        $this->register(
            [
                $this->getHeaderSection(),

                $this->getHpIntroSection(),
            ]
        );
    }


    public function getHeaderSection()
    {

        $section = new HeaderSection($this->config);

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


    public function getHpIntroSection()
    {
        $section = new IntroSection($this->config);

        $section->addField(
            IntroMsgField::createWithMod(
                $this->sectionModifications->getHpSectionMods()
                                           ->getIntroSectionMods()
                                           ->getIntroMsgMod()
            )
        );

        $section->addField(
            IntroLinksGroup::createWithMod(
                $this->sectionModifications->getHpSectionMods()
                                           ->getIntroSectionMods()
                                           ->getIntroLinksMod()
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
