<?php

namespace VirgilSecurity\Templates;


use VirgilSecurity\Models\ContactsPageModel;

use VirgilSecurity\Templates\Src\Template;

class ContactsPageTemplate extends Template
{
    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'contacts-page.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new ContactsPageModel();
    }
}
