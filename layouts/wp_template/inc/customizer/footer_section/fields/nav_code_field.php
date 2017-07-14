<?php

namespace VirgilSecurity\Customizer\FooterSection\Fields;


use VirgilSecurity\Customizer\Fields\CodeField;

class NavCodeField extends CodeField
{
    protected $optional = true;


    public function getLabel()
    {
        return __('Navigation');
    }


    public function getChoices()
    {
        return [
            'language' => 'markdown',
            'theme'    => 'kirki-dark',
        ];
    }
}
