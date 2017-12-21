<?php

namespace VirgilSecurity\Customizer\FrontPage\ServicesSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class ServicesCaptionField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Caption message");
    }
}
