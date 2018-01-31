<?php

namespace VirgilSecurity\Customizer\FooterSection\Fields;


use VirgilSecurity\Customizer\Fields\LinkField;

class SlackLinkField extends LinkField
{
    protected $optional = true;


    public function getLabel()
    {
        return __('Slack Link');
    }
}
