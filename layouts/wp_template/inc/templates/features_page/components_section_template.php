<?php

namespace VirgilSecurity\Templates\FeaturesPage;


use VirgilSecurity\Models\FeaturesPage\ComponentsSectionModel;
use VirgilSecurity\Templates\Src\Template;

class ComponentsSectionTemplate extends Template
{
    const ENTRY_KEY = 'components';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'features_page/components_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new ComponentsSectionModel();
    }
}
