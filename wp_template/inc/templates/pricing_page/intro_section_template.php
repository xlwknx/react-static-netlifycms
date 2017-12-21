<?php

namespace VirgilSecurity\Templates\PricingPage;


use VirgilSecurity\Models\PricingPage\IntroSectionModel;
use VirgilSecurity\Templates\Src\Template;

class IntroSectionTemplate extends Template
{
    const ENTRY_KEY = 'intro';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'pricing_page/intro_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new IntroSectionModel();
    }
}
