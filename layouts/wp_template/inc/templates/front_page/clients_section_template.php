<?php

namespace VirgilSecurity\Templates\FrontPage;


use VirgilSecurity\Models\FrontPage\ClientsSectionModel;
use VirgilSecurity\Templates\Src\Template;

class ClientsSectionTemplate extends Template
{
    const ENTRY_KEY = 'clients';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'front_page/clients_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new ClientsSectionModel();
    }
}
