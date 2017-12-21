<?php

namespace VirgilSecurity\Customizer\PricingPage\ConclusionSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class ConclusionHeadlineField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Headline");
    }
}
