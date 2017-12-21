<?php

namespace VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Fields;


use VirgilSecurity\Customizer\Fields\TextareaField;

class EnterpriseTextField extends TextareaField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Text");
    }
}
