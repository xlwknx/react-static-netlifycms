<?php

namespace VirgilSecurity\Customizer\Hp\IntroSection\Groups;


use VirgilSecurity\Customizer\Fields\ImageField;
use VirgilSecurity\Customizer\Fields\LinkField;
use VirgilSecurity\Customizer\Fields\TextField;
use VirgilSecurity\Customizer\Src\FieldsGroup;

class IntroLangsGroup extends FieldsGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setField(new TextField('lang_label', __('Lang Label')));
        $this->setField(new ImageField('lang_image', __('Lang Image')));
        $this->setField(new LinkField('lang_url', __('Lang URL')));

        $this->setRowLabel('lang_label', __('intro lang'));

        parent::__construct('hp_intro_langs', __('Intro langs'));
    }
}
