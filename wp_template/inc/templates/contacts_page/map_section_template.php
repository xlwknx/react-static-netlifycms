<?php

namespace VirgilSecurity\Templates\ContactsPage;


use VirgilSecurity\Models\ContactsPage\MapSectionModel;
use VirgilSecurity\Templates\Src\Template;

class MapSectionTemplate extends Template
{
    const ENTRY_KEY = 'map';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'contacts_page/map_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new MapSectionModel();
    }
}
