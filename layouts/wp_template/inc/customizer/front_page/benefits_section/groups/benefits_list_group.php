<?php

namespace VirgilSecurity\Customizer\FrontPage\BenefitsSection\Groups;


use VirgilSecurity\Customizer\Fields\ImageField;
use VirgilSecurity\Customizer\Fields\Repeater\NumberField;
use VirgilSecurity\Customizer\Fields\TextField;

use VirgilSecurity\Customizer\Src\FieldsGroup;

class BenefitsListGroup extends FieldsGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setField(new TextField('title', __('Title')));
        $this->setField(new TextField('text', __('Text')));
        $this->setField(new ImageField('image', __('Image')));
        $this->setField(new NumberField('width', __('Width')));
        $this->setField(new NumberField('height', __('Height')));

        $this->setRowLabel('title', __('benefit'));

        parent::__construct('hp_benefits_list', __('Benefits'));
    }
}
