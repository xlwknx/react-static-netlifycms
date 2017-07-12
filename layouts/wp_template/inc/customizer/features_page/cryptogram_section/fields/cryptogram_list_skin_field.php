<?php

namespace VirgilSecurity\Customizer\FeaturesPage\CryptogramSection\Fields;


use VirgilSecurity\Customizer\Fields\SelectField;

class CryptogramListSkinField extends SelectField
{
    protected $multiple = 0;

    protected $default = 'regular';


    public function getChoices()
    {
        return [
            'regular'     => __('Regular white'),
            'highlighted' => __('Highlighted red'),
        ];
    }


    public function getLabel()
    {
        return __('Select cryptogram skin');
    }
}
