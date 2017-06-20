<?php

namespace VirgilSecurity\Customizer\HeaderSection\Fields;


use VirgilSecurity\Customizer\Fields\CodeField;

class MenuCodeField extends CodeField
{
    protected $priority = 2;


    public function getSettings()
    {
        return 'header_menu';
    }


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
