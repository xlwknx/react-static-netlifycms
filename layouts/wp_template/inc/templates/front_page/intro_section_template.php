<?php

namespace VirgilSecurity\Templates\FrontPage;


use VirgilSecurity\Models\FrontPage\IntroSectionModel;

use VirgilSecurity\Templates\Src\Template;

class IntroSectionTemplate extends Template
{
    const ENTRY_KEY = 'intro';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'front-page/intro_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new IntroSectionModel();
    }
}
