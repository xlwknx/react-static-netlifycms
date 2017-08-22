<?php

namespace VirgilSecurity\Templates\FeaturesPage;


use VirgilSecurity\Models\FeaturesPage\ConclusionSectionModel;

use VirgilSecurity\Templates\Src\Template;

class ConclusionSectionTemplate extends Template
{
    const ENTRY_KEY = 'conclusion';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'features_page/conclusion_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new ConclusionSectionModel();
    }
}
