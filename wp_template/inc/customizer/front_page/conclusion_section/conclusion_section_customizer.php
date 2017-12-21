<?php

namespace VirgilSecurity\Customizer\FrontPage\ConclusionSection;


use VirgilSecurity\Customizer\FrontPage\ConclusionSection\Fields\ConclusionHeadlineField;
use VirgilSecurity\Customizer\FrontPage\ConclusionSection\Fields\ConclusionTextField;
use VirgilSecurity\Customizer\FrontPage\ConclusionSection\Groups\ConclusionLinksGroup;
use VirgilSecurity\Customizer\FrontPage\ConclusionSection\Modifications\Sections\ConclusionSectionMods;

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
            ConclusionTextField::createWithMod($conclusionSectionMods->getConclusionTextMod())
        );

        $section->addField(
            ConclusionLinksGroup::createWithMod($conclusionSectionMods->getConclusionLinksListMod())
        );


        return $section;
    }
}
