<?php

namespace VirgilSecurity\Customizer\HeaderSection\Fields;


use VirgilSecurity\Customizer\Fields\LinkField;

class MobileLinkUrlField extends LinkField
{
    protected $optional = true;


    public function getLabel()
    {
        return __('Mobile link');
    }
}
