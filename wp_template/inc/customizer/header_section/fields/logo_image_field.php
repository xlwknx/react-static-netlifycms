<?php

namespace VirgilSecurity\Customizer\HeaderSection\Fields;


use VirgilSecurity\Customizer\Fields\ImageField;

class LogoImageField extends ImageField
{
    protected $optional = true;


    public function getLabel()
    {
        return __('Select logo image');
    }
}
