<?php

namespace VirgilSecurity\Customizer\FrontPage\ServicesSection\Groups;


use VirgilSecurity\Customizer\Fields\ImageField;
use VirgilSecurity\Customizer\Fields\LinkField;
use VirgilSecurity\Customizer\Fields\Repeater\NumberField;
use VirgilSecurity\Customizer\Fields\TextField;

use VirgilSecurity\Customizer\Src\FieldsGroup;

class ServicesListGroup extends FieldsGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setField(new ImageField('image', __('Image')));
        $this->setField(new NumberField('width', __('Image width')));
        $this->setField(new NumberField('height', __('Image height')));
        $this->setField(new TextField('text', __('Text')));
        $this->setField(new TextField('hover_text', __('Text on hover')));
        $this->setField(new LinkField('url', __('Url')));

        $this->setRowLabel('text', __('service'));

        parent::__construct('hp_services_list', __('Services list'));
    }
}
