<?php

namespace VirgilSecurity\Customizer\FeaturesPage\CryptogramSection\Groups;


use VirgilSecurity\Customizer\FeaturesPage\CryptogramSection\Fields\CryptogramListSkinField;

use VirgilSecurity\Customizer\Fields\ImageField;
use VirgilSecurity\Customizer\Fields\TextareaField;

use VirgilSecurity\Customizer\Src\FieldsGroup;

class CryptogramListGroup extends FieldsGroup
{
    protected $optional = true;

    protected $limit = 3;


    public function __construct()
    {
        $this->setField(new ImageField('image', __('Image')));
        $this->setField(new TextareaField('items', __('Items list (separated by empty line)')));
        $this->setField(new CryptogramListSkinField('skin', __('Skin')));

        $this->setRowLabel('skin', __('item'));

        parent::__construct('features_page_cryptogram_list', __('Cryptogram list'));
    }
}
