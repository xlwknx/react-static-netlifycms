<?php

namespace VirgilSecurity\Customizer\FrontPage\ServicesSection\Fields;


use VirgilSecurity\Customizer\Fields\TextareaField;

class ServicesMessageField extends TextareaField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Message text");
    }
}
