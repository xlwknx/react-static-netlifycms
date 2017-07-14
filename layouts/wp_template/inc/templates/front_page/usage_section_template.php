<?php

namespace VirgilSecurity\Templates\FrontPage;


use VirgilSecurity\Models\FrontPage\UsageSectionModel;
use VirgilSecurity\Templates\Src\Template;

class UsageSectionTemplate extends Template
{
    const ENTRY_KEY = 'usage';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'front_page/usage_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new UsageSectionModel();
    }
}
