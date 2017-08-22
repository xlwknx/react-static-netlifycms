<?php

namespace VirgilSecurity\Customizer\FeaturesPage\ConclusionSection;


use VirgilSecurity\Customizer\FeaturesPage\ConclusionSection\Fields\ConclusionHeadlineField;

use VirgilSecurity\Customizer\FeaturesPage\ConclusionSection\Groups\ConclusionLinksGroup;
use VirgilSecurity\Customizer\FeaturesPage\ConclusionSection\Modifications\Sections\ConclusionSectionMods;

use WP_Customize_Manager;

class ConclusionSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(ConclusionSectionMods $conclusionSectionMods)
    {
        $section = new ConclusionSection($this->config, $this->wpCustomizer);


        $section->addField(
            ConclusionHeadlineField::createWithMod($conclusionSectionMods->getConclusionHeadlineMod())
        );

        $section->addField(
            ConclusionLinksGroup::createWithMod($conclusionSectionMods->getConclusionLinksMod()));

        return $section;
    }
}
