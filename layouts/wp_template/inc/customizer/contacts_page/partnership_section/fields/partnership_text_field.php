<?php

namespace VirgilSecurity\Customizer\ContactsPage\PartnershipSection\Fields;


use VirgilSecurity\Customizer\Fields\TextareaField;

class PartnershipTextField extends TextareaField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Text");
    }
}
