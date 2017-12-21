<?php

namespace VirgilSecurity\Templates\PricingPage;


use VirgilSecurity\Models\PricingPage\IncludesSectionModel;
use VirgilSecurity\Templates\Src\Template;

class IncludesSectionTemplate extends Template
{
    const ENTRY_KEY = 'includes';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'pricing_page/includes_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new IncludesSectionModel();
    }
}
