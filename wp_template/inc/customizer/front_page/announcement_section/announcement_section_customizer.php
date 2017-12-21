<?php

namespace VirgilSecurity\Customizer\FrontPage\AnnouncementSection;


use VirgilSecurity\Customizer\Fields\CodeField;
use VirgilSecurity\Customizer\Fields\TextareaField;
use VirgilSecurity\Customizer\FrontPage\AnnouncementSection\Modifications\Sections\AnnouncementSectionMods;

use WP_Customize_Manager;

class AnnouncementSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(AnnouncementSectionMods $announcementSectionMods)
    {
        $section = new AnnouncementSection($this->config, $this->wpCustomizer);

        $section->addField(
            CodeField::createWithMod($announcementSectionMods->getMessageMod())
        );


        return $section;
    }
}
