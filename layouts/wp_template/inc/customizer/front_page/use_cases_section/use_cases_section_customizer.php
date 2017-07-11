<?php

namespace VirgilSecurity\Customizer\FrontPage\UseCasesSection;


use VirgilSecurity\Customizer\FrontPage\UseCasesSection\Groups\UseCasesLinksGroup;
use VirgilSecurity\Customizer\FrontPage\UseCasesSection\Fields\UseCasesCaptionField;
use VirgilSecurity\Customizer\FrontPage\UseCasesSection\Fields\UseCasesHeadlineField;
use VirgilSecurity\Customizer\FrontPage\UseCasesSection\Fields\UseCasesMessageField;
use VirgilSecurity\Customizer\FrontPage\UseCasesSection\Modifications\Sections\UseCasesSectionMods;

use WP_Customize_Manager;

class UseCasesSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(UseCasesSectionMods $useCasesSectionMods)
    {
        $section = new UseCasesSection($this->config, $this->wpCustomizer);

        $section->addField(
            UseCasesHeadlineField::createWithMod($useCasesSectionMods->getUseCasesHeadlineMod())
        );

        $section->addField(
            UseCasesMessageField::createWithMod($useCasesSectionMods->getUseCasesTextMod())
        );

        $section->addField(
            UseCasesLinksGroup::createWithMod(
                $useCasesSectionMods->getUseCasesLinksMod()
            )
        );

        $section->addField(
            UseCasesCaptionField::createWithMod(
                $useCasesSectionMods->getUseCasesListCaptionMod()
            )
        );


        return $section;
    }
}
