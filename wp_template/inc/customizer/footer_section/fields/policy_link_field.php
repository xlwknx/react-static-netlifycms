<?php

namespace VirgilSecurity\Customizer\FooterSection\Fields;


use VirgilSecurity\Customizer\Fields\LinkField;

class PolicyLinkField extends LinkField
{
    protected $optional = true;


    public function getLabel()
    {
        return __('Terms of Use Link');
    }
}
