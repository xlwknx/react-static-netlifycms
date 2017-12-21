<?php

namespace VirgilSecurity\Customizer\PricingPage\IntroSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class IntroHeadlineField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Headline");
    }
}
