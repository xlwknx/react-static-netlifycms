<?php

namespace VirgilSecurity\Templates\Base;


use VirgilSecurity\Models\Base\HeaderSectionModel;

use VirgilSecurity\Templates\Src\Template;

class HeaderSectionTemplate extends Template
{
    const ENTRY_KEY = 'header';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'base/header_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new HeaderSectionModel();
    }
}
