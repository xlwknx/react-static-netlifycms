<?php

namespace VirgilSecurity\Customizer\HeaderSection\Fields;


use VirgilSecurity\Customizer\Fields\CodeField;

class MobileMenuCodeField extends CodeField
{
    protected $optional = true;


    public function getLabel()
    {
        return __('Mobile menu');
    }


    public function getChoices()
    {
        return [
            'language' => 'markdown',
            'theme'    => 'kirki-dark',
        ];
    }
}
