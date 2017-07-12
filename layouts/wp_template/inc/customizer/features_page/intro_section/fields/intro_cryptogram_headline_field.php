<?php

namespace VirgilSecurity\Customizer\FeaturesPage\IntroSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class IntroCryptogramHeadlineField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Cryptogram headline");
    }
}
