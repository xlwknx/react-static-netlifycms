<?php

namespace VirgilSecurity\Templates\FrontPage;


use VirgilSecurity\Models\FrontPage\IntroSectionModel;

use VirgilSecurity\Models\FrontPage\UseCasesSectionModel;
use VirgilSecurity\Templates\Src\Template;

class UseCasesSectionTemplate extends Template
{
    const ENTRY_KEY = 'use_cases';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'front_page/use_cases_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new UseCasesSectionModel();
    }
}
