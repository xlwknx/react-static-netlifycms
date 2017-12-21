<?php

namespace VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Fields;


use VirgilSecurity\Customizer\Fields\TextareaField;

class ContactUsTextField extends TextareaField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Text");
    }
}
