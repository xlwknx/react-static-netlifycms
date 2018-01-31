<?php

namespace VirgilSecurity\Customizer\FooterSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class SlackLinkTextField extends TextField
{
    public function getLabel()
    {
        return __('Slack Text');
    }
}
