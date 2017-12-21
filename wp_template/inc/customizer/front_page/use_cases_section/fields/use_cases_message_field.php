<?php

namespace VirgilSecurity\Customizer\FrontPage\UseCasesSection\Fields;


use VirgilSecurity\Customizer\Fields\TextareaField;

class UseCasesMessageField extends TextareaField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Message text");
    }
}
