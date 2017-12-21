<?php

namespace VirgilSecurity\Customizer\FooterSection\Fields;


use VirgilSecurity\Customizer\Fields\ImageField;

class LogoImageField extends ImageField
{
    protected $optional = true;


    public function getLabel()
    {
        return __('Logo image');
    }
}
