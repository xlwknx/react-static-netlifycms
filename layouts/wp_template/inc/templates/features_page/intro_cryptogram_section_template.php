<?php

namespace VirgilSecurity\Templates\FeaturesPage;


use VirgilSecurity\Models\FeaturesPage\IntroCryptogramSectionModel;
use VirgilSecurity\Templates\Src\Template;

class IntroCryptogramSectionTemplate extends Template
{
    const ENTRY_KEY = 'intro_cryptogram';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'features_page/intro_cryptogram_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new IntroCryptogramSectionModel();
    }
}
