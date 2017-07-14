<?php

namespace VirgilSecurity\Customizer\FrontPage\ServicesSection;


use VirgilSecurity\Customizer\FrontPage\ServicesSection\Fields\ServicesCaptionField;
use VirgilSecurity\Customizer\FrontPage\ServicesSection\Fields\ServicesHeadlineField;
use VirgilSecurity\Customizer\FrontPage\ServicesSection\Fields\ServicesMessageField;
use VirgilSecurity\Customizer\FrontPage\ServicesSection\Groups\ServicesListGroup;
use VirgilSecurity\Customizer\FrontPage\ServicesSection\Modifications\Sections\ServicesSectionMods;

use WP_Customize_Manager;

class ServicesSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(ServicesSectionMods $servicesSectionMods)
    {
        $section = new ServicesSection($this->config, $this->wpCustomizer);

        $section->addField(
            ServicesHeadlineField::createWithMod($servicesSectionMods->getServicesHeadlineMod())
        );

        $section->addField(
            ServicesMessageField::createWithMod($servicesSectionMods->getServicesTextMod())
        );

        $section->addField(
            ServicesCaptionField::createWithMod($servicesSectionMods->getServicesCaptionMod())
        );

        $section->addField(
            ServicesListGroup::createWithMod($servicesSectionMods->getServicesListMod())
        );

        return $section;
    }
}
