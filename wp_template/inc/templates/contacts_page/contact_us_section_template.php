<?php

namespace VirgilSecurity\Templates\ContactsPage;


use VirgilSecurity\Models\ContactsPage\ContactUsSectionModel;
use VirgilSecurity\Templates\Src\Template;

class ContactUsSectionTemplate extends Template
{
    const ENTRY_KEY = 'contact_us';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'contacts_page/contact_us_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new ContactUsSectionModel();
    }
}
