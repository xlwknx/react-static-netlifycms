<?php

namespace VirgilSecurity\Customizer\FeaturesPage\IntroSection;


use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Fields\IntroCryptogramHeadlineField;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Fields\IntroHeadlineField;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Fields\IntroTextField;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Groups\IntroCryptogramListGroup;

use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Groups\IntroListGroup;
use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Modifications\Sections\IntroSectionMods;

use WP_Customize_Manager;

class IntroSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(IntroSectionMods $introSectionMods)
    {
        $section = new IntroSection($this->config, $this->wpCustomizer);

        $section->addField(
            IntroHeadlineField::createWithMod($introSectionMods->getIntroHeadlineMod())
        );

        $section->addField(
            IntroTextField::createWithMod($introSectionMods->getIntroTextMod())
        );

        $section->addField(
            IntroListGroup::createWithMod($introSectionMods->getIntroListMod())
        );

        $section->addField(
            IntroCryptogramHeadlineField::createWithMod($introSectionMods->getIntroCryptogramHeadlineMod())
        );

        $section->addField(
            IntroCryptogramListGroup::createWithMod($introSectionMods->getIntroCryptogramListMod())
        );

        return $section;
    }
}
