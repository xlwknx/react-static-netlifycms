<?php

namespace VirgilSecurity\Templates;


use VirgilSecurity\Models\PricingPageModel;

use VirgilSecurity\Templates\Src\Template;

class PricingPageTemplate extends Template
{
    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'pricing-page.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new PricingPageModel();
    }
}
