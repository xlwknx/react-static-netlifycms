<?php

namespace VirgilSecurity\Customizer\PricingPage\IncludesSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class IncludesHeadlineField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Headline");
    }
}
