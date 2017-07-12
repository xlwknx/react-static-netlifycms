<?php

namespace VirgilSecurity\Customizer\FeaturesPage\IntroSection\Fields;


use VirgilSecurity\Customizer\Fields\SelectField;

class IntroCryptogramListSkinField extends SelectField
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
