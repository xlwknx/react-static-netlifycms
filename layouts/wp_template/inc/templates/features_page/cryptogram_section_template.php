<?php

namespace VirgilSecurity\Templates\FeaturesPage;


use VirgilSecurity\Models\FeaturesPage\CryptogramSectionModel;
use VirgilSecurity\Templates\Src\Template;

class CryptogramSectionTemplate extends Template
{
    const ENTRY_KEY = 'cryptogram';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'features_page/cryptogram_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new CryptogramSectionModel();
    }
}
