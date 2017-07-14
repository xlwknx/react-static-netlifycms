<?php

namespace VirgilSecurity\Customizer\FooterSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class PolicyLinkTextField extends TextField
{
    public function getLabel()
    {
        return __('Terms of Use Text');
    }
}
