<?php

namespace VirgilSecurity\Customizer\ContactsPage\MapSection;


use VirgilSecurity\Customizer\ContactsPage\ContactsPageSection;

use VirgilSecurity\Templates\ContactsPage\MapSectionTemplate;

class MapSection extends ContactsPageSection
{
    protected $optional = 1;

    protected $priority = 25;

    protected $selector = '.page .map';


    public function getSection()
    {
        return 'contacts_page_map_section';
    }


    public function getTitle()
    {
        return __('Map Section');
    }


    public function getDescription()
    {
        return __('Customize map section');
    }


    public function getSectionTemplate()
    {
        return new MapSectionTemplate();
    }
}
