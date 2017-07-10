<?php

namespace VirgilSecurity\Templates\FrontPage;


use VirgilSecurity\Models\FrontPage\ServicesSectionModel;

use VirgilSecurity\Templates\Src\Template;

class ServicesSectionTemplate extends Template
{
    const ENTRY_KEY = 'services';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'front-page/services.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new ServicesSectionModel();
    }
}
