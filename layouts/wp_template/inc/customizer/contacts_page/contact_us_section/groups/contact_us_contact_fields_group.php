<?php

namespace VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Groups;


use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Fields\ContactUsContactTypeField;
use VirgilSecurity\Customizer\Fields\TextareaField;
use VirgilSecurity\Customizer\Src\FieldsGroup;

class ContactUsContactFieldsGroup extends FieldsGroup
{
    protected $optional = true;


    public function __construct()
    {

        $this->setField(new TextareaField('text', __('Text')));
        $this->setField(new ContactUsContactTypeField('type'));

        $this->setRowLabel('type', __('contact'));

        parent::__construct('contacts_page_contact_us_contact_fields', __('Contacts fields'));
    }
}
