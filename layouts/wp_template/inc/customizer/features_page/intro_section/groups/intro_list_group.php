<?php

namespace VirgilSecurity\Customizer\FeaturesPage\IntroSection\Groups;


use VirgilSecurity\Customizer\Fields\ImageField;
use VirgilSecurity\Customizer\Fields\TextareaField;

use VirgilSecurity\Customizer\Src\FieldsGroup;

class IntroListGroup extends FieldsGroup
{
    protected $optional = true;

    protected $limit = 6;


    public function __construct()
    {
        $this->setField(new ImageField('image', __('Image')));
        $this->setField(new TextareaField('text', __('Text')));

        $this->setRowLabel('text', __('item'));

        parent::__construct('features_page_intro_intro_list', __('Intro list'));
    }
}
