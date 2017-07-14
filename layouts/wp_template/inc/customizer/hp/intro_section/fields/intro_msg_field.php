<?php
namespace VirgilSecurity\Customizer\Hp\IntroSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class IntroMsgField extends TextField
{
    protected $priority = 1;


    public function getLabel()
    {
        return __("Intro mesage text");
    }
}
