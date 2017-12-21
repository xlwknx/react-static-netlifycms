<?php

namespace VirgilSecurity\Templates\ContactsPage;


use VirgilSecurity\Models\ContactsPage\PartnershipSectionModel;
use VirgilSecurity\Templates\Src\Template;

class PartnershipSectionTemplate extends Template
{
    const ENTRY_KEY = 'partnership';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'contacts_page/partnership_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new PartnershipSectionModel();
    }
}
