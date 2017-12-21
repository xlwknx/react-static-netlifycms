<?php

namespace VirgilSecurity\Templates;


use VirgilSecurity\Models\FrontPageModel;

use VirgilSecurity\Templates\Src\Template;

class FrontPageTemplate extends Template
{
    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'front-page.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new FrontPageModel();
    }
}
