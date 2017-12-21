<?php

namespace VirgilSecurity\Templates;


use VirgilSecurity\Models\FeaturesPageModel;

use VirgilSecurity\Templates\Src\Template;

class FeaturesPageTemplate extends Template
{
    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'features-page.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new FeaturesPageModel();
    }
}
