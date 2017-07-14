<?php

namespace VirgilSecurity\Customizer\PricingPage\IncludesSection\Groups;


use VirgilSecurity\Customizer\Fields\ImageField;
use VirgilSecurity\Customizer\Fields\TextareaField;
use VirgilSecurity\Customizer\Fields\TextField;

use VirgilSecurity\Customizer\Src\FieldsGroup;

class IncludesListGroup extends FieldsGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setField(new ImageField('image', __('Image')));
        $this->setField(new TextField('headline', __('Title')));
        $this->setField(new TextareaField('text', __('Text')));

        $this->setRowLabel('headline', __('item'));

        parent::__construct('pricing_page_includes_list', __('List'));
    }
}
