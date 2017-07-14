<?php

namespace VirgilSecurity\Templates\FrontPage;


use VirgilSecurity\Models\FrontPage\BenefitsSectionModel;
use VirgilSecurity\Templates\Src\Template;

class BenefitsSectionTemplate extends Template
{
    const ENTRY_KEY = 'benefits';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'front_page/benefits_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new BenefitsSectionModel();
    }
}
