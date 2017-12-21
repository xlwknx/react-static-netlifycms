<?php

namespace VirgilSecurity\Customizer\FeaturesPage\FeaturesSection\Groups;


use VirgilSecurity\Customizer\Fields\ImageField;
use VirgilSecurity\Customizer\Fields\Repeater\NumberField;
use VirgilSecurity\Customizer\Fields\TextField;

use VirgilSecurity\Customizer\Src\FieldsGroup;

class FeaturesListGroup extends FieldsGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setField(new TextField('title', __('Title')));
        $this->setField(new ImageField('image', __('Image')));
        $this->setField(new NumberField('width', __('Width')));
        $this->setField(new NumberField('height', __('Height')));

        $this->setRowLabel('title', __('feature'));

        parent::__construct('features_page_features_list', __('Features list'));
    }
}
