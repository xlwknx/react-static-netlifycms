<?php

namespace VirgilSecurity\Templates\Base;


use VirgilSecurity\Models\Base\FooterSectionModel;

use VirgilSecurity\Templates\Src\Template;

class FooterSectionTemplate extends Template
{
    const ENTRY_KEY = 'footer';


    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'base/footer_section.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new FooterSectionModel();
    }
}
