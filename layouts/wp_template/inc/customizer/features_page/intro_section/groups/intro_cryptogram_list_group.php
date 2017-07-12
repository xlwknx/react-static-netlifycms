<?php

namespace VirgilSecurity\Customizer\FeaturesPage\IntroSection\Groups;


use VirgilSecurity\Customizer\FeaturesPage\IntroSection\Fields\IntroCryptogramListSkinField;

use VirgilSecurity\Customizer\Fields\ImageField;
use VirgilSecurity\Customizer\Fields\TextareaField;

use VirgilSecurity\Customizer\Src\FieldsGroup;

class IntroCryptogramListGroup extends FieldsGroup
{
    protected $optional = true;

    protected $limit = 3;


    public function __construct()
    {
        $this->setField(new ImageField('image', __('Image')));
        $this->setField(new TextareaField('items', __('Items list (separated by `,`)')));
        $this->setField(new IntroCryptogramListSkinField('skin', __('Skin')));

        $this->setRowLabel('skin', __('item'));

        parent::__construct('features_page_intro_cryptogram_list', __('Cryptogram list'));
    }
}
