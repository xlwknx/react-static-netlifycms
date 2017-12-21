<?php

namespace VirgilSecurity\Customizer\FeaturesPage\CryptogramSection;


use VirgilSecurity\Customizer\FeaturesPage\CryptogramSection\Modifications\Sections\CryptogramSectionMods;

use VirgilSecurity\Customizer\FeaturesPage\CryptogramSection\Fields\CryptogramHeadlineField;

use VirgilSecurity\Customizer\FeaturesPage\CryptogramSection\Groups\CryptogramListGroup;
use WP_Customize_Manager;

class CryptogramSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(CryptogramSectionMods $cryptogramSectionMods)
    {
        $section = new CryptogramSection($this->config, $this->wpCustomizer);


        $section->addField(
            CryptogramHeadlineField::createWithMod($cryptogramSectionMods->getCryptogramHeadlineMod())
        );

        $section->addField(
            CryptogramListGroup::createWithMod($cryptogramSectionMods->getCryptogramListMod())
        );

        return $section;
    }
}
