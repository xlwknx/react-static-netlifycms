<?php

namespace VirgilSecurity\Customizer\FrontPage\UsageSection\Fields;


use VirgilSecurity\Customizer\Fields\TextareaField;

class UsageTextField extends TextareaField
{
    protected $optional = true;


    public function getLabel()
    {
        return __('Text');
    }
}
