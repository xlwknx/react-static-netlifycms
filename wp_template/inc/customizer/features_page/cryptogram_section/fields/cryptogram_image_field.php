<?php

namespace VirgilSecurity\Customizer\FeaturesPage\CryptogramSection\Fields;


use VirgilSecurity\Customizer\Fields\ImageField;

class CryptogramImageField extends ImageField
{
    protected $optional = true;


    public function getLabel()
    {
        return __('Cryptogram Image');
    }
}
