<?php

namespace VirgilSecurity\Templates\PricingPage;


use VirgilSecurity\Models\PricingPage\EnterpriseSectionModel;
use VirgilSecurity\Templates\Src\Template;

class EnterpriseSectionTemplate extends Template
{
    const ENTRY_KEY = 'enterprise';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'pricing_page/enterprise_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new EnterpriseSectionModel();
    }
}
