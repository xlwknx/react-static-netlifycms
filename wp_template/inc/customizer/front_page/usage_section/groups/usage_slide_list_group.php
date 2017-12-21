<?php

namespace VirgilSecurity\Customizer\FrontPage\UsageSection\Groups;


use VirgilSecurity\Customizer\Fields\ImageField;
use VirgilSecurity\Customizer\Fields\LinkField;
use VirgilSecurity\Customizer\Fields\TextField;

use VirgilSecurity\Customizer\Src\FieldsGroup;


class UsageSlideListGroup extends FieldsGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setField(new TextField('name', __('Slide name')));
        $this->setField(new LinkField('link', __('Slide link')));
        $this->setField(new ImageField('image', __('Slide image')));

        $this->setRowLabel('name', __('slide'));

        parent::__construct('hp_usage_slide_list', __('Usage slides'));
    }
}
