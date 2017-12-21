<?php

namespace VirgilSecurity\Customizer\PricingPage\IncludesSection\Fields;


use VirgilSecurity\Customizer\Fields\TextareaField;

class IncludesTextField extends TextareaField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Text");
    }
}
