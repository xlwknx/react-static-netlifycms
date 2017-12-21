<?php

namespace VirgilSecurity\Customizer\FooterSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class LogoDescriptionField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __('#Hashtag');
    }
}
