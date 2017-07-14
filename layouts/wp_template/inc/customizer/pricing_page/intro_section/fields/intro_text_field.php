<?php

namespace VirgilSecurity\Customizer\PricingPage\IntroSection\Fields;


use VirgilSecurity\Customizer\Fields\TextareaField;

class IntroTextField extends TextareaField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Text");
    }
}
