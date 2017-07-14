<?php

namespace VirgilSecurity\Customizer\HeaderSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class MobileLinkTextField extends TextField
{
    protected $optional = false;


    public function getLabel()
    {
        return __('Mobile link text');
    }
}
