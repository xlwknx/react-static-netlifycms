<?php

namespace VirgilSecurity\Customizer\FeaturesPage\CryptogramSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class CryptogramHeadlineField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Cryptogram headline");
    }
}
