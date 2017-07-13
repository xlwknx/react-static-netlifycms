<?php

namespace VirgilSecurity\Customizer\ContactsPage\ContactUsSection;


use VirgilSecurity\Customizer\ContactsPage\ContactsPageSection;

use VirgilSecurity\Templates\ContactsPage\ContactUsSectionTemplate;

class ContactUsSection extends ContactsPageSection
{
    protected $optional = 1;

    protected $priority = 25;

    protected $selector = '.page .contactUs';


    public function getSection()
    {
        return 'contacts_page_contact_us_section';
    }


    public function getTitle()
    {
        return __('Contact Us Section');
    }


    public function getDescription()
    {
        return __('Customize Contact Us section');
    }


    public function getSectionTemplate()
    {
        return new ContactUsSectionTemplate();
    }
}
