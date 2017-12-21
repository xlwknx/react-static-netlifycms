<?php

namespace VirgilSecurity\Customizer\FrontPage\AnnouncementSection;


use VirgilSecurity\Customizer\FrontPage\FrontPageSection;

use VirgilSecurity\Templates\FrontPage\AnnouncementSectionTemplate;

class AnnouncementSection extends FrontPageSection
{
    protected $optional = 1;

    protected $priority = 24;

    protected $selector = '.homePage .pageMsg';


    public function getSection()
    {
        return 'hp_announcement_section';
    }


    public function getTitle()
    {
        return __('Announcement Section');
    }


    public function getDescription()
    {
        return __('Customize announcement section');
    }


    public function getSectionTemplate()
    {
        return new AnnouncementSectionTemplate();
    }
}
