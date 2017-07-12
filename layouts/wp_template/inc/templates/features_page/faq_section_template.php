<?php

namespace VirgilSecurity\Templates\FeaturesPage;


use VirgilSecurity\Models\FeaturesPage\FaqSectionModel;
use VirgilSecurity\Templates\Src\Template;

class FaqSectionTemplate extends Template
{
    const ENTRY_KEY = 'faq';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'features_page/faq_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new FaqSectionModel();
    }
}
