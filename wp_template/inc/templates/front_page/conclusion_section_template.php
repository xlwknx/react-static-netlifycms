<?php

namespace VirgilSecurity\Templates\FrontPage;


use VirgilSecurity\Models\FrontPage\ConclusionSectionModel;
use VirgilSecurity\Templates\Src\Template;

class ConclusionSectionTemplate extends Template
{
    const ENTRY_KEY = 'conclusion';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'front_page/conclusion_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new ConclusionSectionModel();
    }
}
