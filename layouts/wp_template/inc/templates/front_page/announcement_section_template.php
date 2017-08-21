<?php

namespace VirgilSecurity\Templates\FrontPage;


use VirgilSecurity\Models\FrontPage\AnnouncementSectionModel;
use VirgilSecurity\Templates\Src\Template;

class AnnouncementSectionTemplate extends Template
{
    const ENTRY_KEY = 'announcement';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'front_page/announcement_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new AnnouncementSectionModel();
    }
}
