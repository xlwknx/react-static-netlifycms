<?php

namespace VirgilSecurity\Customizer\FeaturesPage\IntroSection\Fields;


use VirgilSecurity\Customizer\Fields\ImageField;

class IntroCryptogramImageField extends ImageField
{
    protected $optional = true;


    public function getLabel()
    {
        return __('Select logo image');
    }
}
