<?php

namespace VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Fields;


use VirgilSecurity\Customizer\Fields\IconSelectField;

class ContactUsFormIconField extends IconSelectField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Form icon");
    }
}
