<?php

namespace VirgilSecurity\Customizer\ContactsPage\PartnershipSection;


use VirgilSecurity\Customizer\ContactsPage\ContactsPageSection;

use VirgilSecurity\Templates\ContactsPage\PartnershipSectionTemplate;

class PartnershipSection extends ContactsPageSection
{
    protected $optional = 1;

    protected $priority = 25;

    protected $selector = '.contactsPage .partnership';


    public function getSection()
    {
        return 'contacts_page_partnership_section';
    }


    public function getTitle()
    {
        return __('Partnership Section');
    }


    public function getDescription()
    {
        return __('Customize partnership section');
    }


    public function getSectionTemplate()
    {
        return new PartnershipSectionTemplate();
    }
}
