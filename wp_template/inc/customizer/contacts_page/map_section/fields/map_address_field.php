<?php

namespace VirgilSecurity\Customizer\ContactsPage\MapSection\Fields;


use VirgilSecurity\Customizer\Fields\TextareaField;

class MapAddressField extends TextareaField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Address");
    }
}
