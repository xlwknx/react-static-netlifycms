<?php

namespace VirgilSecurity\Customizer\FrontPage\ClientsSection\Fields;


use VirgilSecurity\Customizer\Fields\LinkField;

class ClientsLinkField extends LinkField
{
    public function getLabel()
    {
        return __("Link URL");
    }
}
