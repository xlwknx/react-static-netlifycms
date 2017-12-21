<?php

namespace VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Fields;


use VirgilSecurity\Customizer\Fields\SelectField;

class ContactUsContactTypeField extends SelectField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Contacts type");
    }


    public function getChoices()
    {
        return [
            'address' => __('Address'),
            'email'   => __('Email'),
            'phone'   => __('Phone'),
        ];
    }
}
