<?php

namespace VirgilSecurity\Customizer\HeaderSection\Fields;


use VirgilSecurity\Customizer\Fields\CodeField;

class MenuCodeField extends CodeField
{
    protected $optional = true;


    public function getLabel()
    {
        return __('Menu');
    }


    public function getChoices()
    {
        return [
            'language' => 'markdown',
            'theme'    => 'kirki-dark',
        ];
    }
}
