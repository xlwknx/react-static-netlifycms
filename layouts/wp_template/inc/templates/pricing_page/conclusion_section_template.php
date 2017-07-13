<?php

namespace VirgilSecurity\Templates\PricingPage;


use VirgilSecurity\Models\PricingPage\ConclusionSectionModel;
use VirgilSecurity\Templates\Src\Template;

class ConclusionSectionTemplate extends Template
{
    const ENTRY_KEY = 'conclusion';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'pricing_page/conclusion_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new ConclusionSectionModel();
    }
}
