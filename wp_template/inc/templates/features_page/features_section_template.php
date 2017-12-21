<?php

namespace VirgilSecurity\Templates\FeaturesPage;


use VirgilSecurity\Models\FeaturesPage\FeaturesSectionModel;
use VirgilSecurity\Templates\Src\Template;

class FeaturesSectionTemplate extends Template
{
    const ENTRY_KEY = 'features';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'features_page/features_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new FeaturesSectionModel();
    }
}
