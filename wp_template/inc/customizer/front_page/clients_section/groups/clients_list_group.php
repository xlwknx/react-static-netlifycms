<?php

namespace VirgilSecurity\Customizer\FrontPage\ClientsSection\Groups;


use VirgilSecurity\Customizer\Fields\ImageField;
use VirgilSecurity\Customizer\Fields\Repeater\NumberField;
use VirgilSecurity\Customizer\Fields\TextField;

use VirgilSecurity\Customizer\Src\FieldsGroup;

class ClientsListGroup extends FieldsGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setField(new TextField('name', __('Name')));
        $this->setField(new ImageField('image', __('Image')));
        $this->setField(new NumberField('width', __('Image width')));
        $this->setField(new NumberField('height', __('Image height')));

        $this->setRowLabel('name', __('client'));

        parent::__construct('hp_clients_list', __('Clients'));
    }
}
