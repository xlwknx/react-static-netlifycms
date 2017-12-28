<?php

namespace VirgilSecurity\Templates;


use VirgilSecurity\Models\IotPageModel;
use VirgilSecurity\Templates\Src\Template;

class IotPageTemplate extends Template
{
    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'iot-page.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new IotPageModel();
    }
}
