<?php

namespace VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class EnterpriseTitleField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Title");
    }
}
