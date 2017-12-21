<?php

namespace VirgilSecurity\Customizer\FrontPage\IntroSection\Fields;


use VirgilSecurity\Customizer\Fields\TextareaField;

class IntroMsgField extends TextareaField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Intro message text");
    }
}
