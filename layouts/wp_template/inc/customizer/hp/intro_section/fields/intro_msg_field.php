<?php

namespace VirgilSecurity\Customizer\Hp\IntroSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class IntroMsgField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Intro message text");
    }
}
