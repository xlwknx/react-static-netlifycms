<?php

namespace VirgilSecurity\Customizer\FeaturesPage\IntroSection\Fields;


use VirgilSecurity\Customizer\Fields\TextareaField;

class IntroTextField extends TextareaField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Intro text");
    }
}
