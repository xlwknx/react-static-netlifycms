<?php

namespace VirgilSecurity\Customizer\FrontPage\IntroSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class IntroServicesHeadlineField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Intro service headline");
    }
}
