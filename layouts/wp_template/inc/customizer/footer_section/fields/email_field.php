<?php

namespace VirgilSecurity\Customizer\FooterSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class EmailField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __('Email');
    }
}
