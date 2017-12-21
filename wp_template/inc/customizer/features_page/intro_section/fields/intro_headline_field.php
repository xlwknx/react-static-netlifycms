<?php

namespace VirgilSecurity\Customizer\FeaturesPage\IntroSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class IntroHeadlineField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Intro headline");
    }
}
