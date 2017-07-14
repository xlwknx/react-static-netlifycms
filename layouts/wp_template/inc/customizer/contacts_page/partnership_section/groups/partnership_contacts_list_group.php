<?php

namespace VirgilSecurity\Customizer\ContactsPage\PartnershipSection\Groups;


use VirgilSecurity\Customizer\Fields\CheckboxField;
use VirgilSecurity\Customizer\Fields\LinkField;
use VirgilSecurity\Customizer\Fields\TextField;

use VirgilSecurity\Customizer\FooterSection\Fields\EmailField;
use VirgilSecurity\Customizer\Src\FieldsGroup;

class PartnershipContactsListGroup extends FieldsGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setField(new TextField('name', __('Name')));
        $this->setField(new TextField('position', __('Position')));

        //$this->setField(new LinkField('facebook', __('Facebook link')));
        //$this->setField(new CheckboxField('is_show_facebook', __('Show facebook link ?')));

        //$this->setField(new LinkField('github', __('Github link')));
        //$this->setField(new CheckboxField('is_show_github', __('Show github link ?')));

        $this->setField(new LinkField('twitter', __('Twitter link')));
        $this->setField(new CheckboxField('is_show_twitter', __('Show twitter link ?')));

        $this->setField(new LinkField('linkedin', __('Linkedin link')));
        $this->setField(new CheckboxField('is_show_linkedin', __('Show linkedin link ?')));

        //$this->setField(new LinkField('medium', __('Medium link')));
        //$this->setField(new CheckboxField('is_show_medium', __('Show medium link ?')));

        //$this->setField(new TextField('tel', __('Phone number')));
        $this->setField(new EmailField('email', __('Email')));
        $this->setField(new CheckboxField('is_show_email', __('Show email link ?')));

        $this->setRowLabel('name', __('contact'));

        parent::__construct('contacts_page_partnership_contacts_list', __('Contacts list'));
    }
}
