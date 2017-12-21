<?php

namespace VirgilSecurity\Templates\FeaturesPage;


use VirgilSecurity\Models\FeaturesPage\IntroSectionModel;
use VirgilSecurity\Templates\Src\Template;

class IntroSectionTemplate extends Template
{
    const ENTRY_KEY = 'intro';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'features_page/intro_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new IntroSectionModel();
    }
}
