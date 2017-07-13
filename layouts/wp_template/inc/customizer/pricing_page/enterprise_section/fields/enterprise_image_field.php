<?php

namespace VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Fields;


use VirgilSecurity\Customizer\Fields\ImageField;

class EnterpriseImageField extends ImageField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Image");
    }
}
