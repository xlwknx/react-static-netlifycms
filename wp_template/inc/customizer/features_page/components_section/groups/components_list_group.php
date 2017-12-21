<?php

namespace VirgilSecurity\Customizer\FeaturesPage\ComponentsSection\Groups;


use VirgilSecurity\Customizer\Fields\ImageField;
use VirgilSecurity\Customizer\Fields\Repeater\NumberField;
use VirgilSecurity\Customizer\Fields\TextareaField;
use VirgilSecurity\Customizer\Fields\TextField;

use VirgilSecurity\Customizer\Src\FieldsGroup;

class ComponentsListGroup extends FieldsGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setField(new TextField('title', __('Title')));
        $this->setField(new TextareaField('text', __('text')));
        $this->setField(new ImageField('image', __('Image')));
        $this->setField(new NumberField('width', __('Width')));
        $this->setField(new NumberField('height', __('Height')));

        $this->setRowLabel('title', __('item'));

        parent::__construct('features_page_components_list', __('Components list'));
    }
}
