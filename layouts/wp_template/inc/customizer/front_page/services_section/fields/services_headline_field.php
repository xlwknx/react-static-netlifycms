<?php

namespace VirgilSecurity\Customizer\FrontPage\ServicesSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class ServicesHeadlineField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Headline message");
    }
}
