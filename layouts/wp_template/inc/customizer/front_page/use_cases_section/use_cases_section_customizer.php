<?php

namespace VirgilSecurity\Customizer\FrontPage\UseCasesSection;


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


    public function getSection(UseCasesSectionMods $introSectionMods)
    {
        $section = new UseCasesSection($this->config, $this->wpCustomizer);

        //$section->addField(
        //    IntroMsgField::createWithMod($introSectionMods->getIntroMsgMod())
        //);
        //
        //$section->addField(
        //    IntroLinksGroup::createWithMod($introSectionMods->getIntroLinksMod())
        //);
        //
        //$section->addField(
        //    IntroLangsGroup::createWithMod($introSectionMods->getIntroLangsMod())
        //);

        return $section;
    }
}
