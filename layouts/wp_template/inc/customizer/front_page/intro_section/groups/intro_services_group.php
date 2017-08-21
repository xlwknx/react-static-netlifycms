<?php

namespace VirgilSecurity\Customizer\FrontPage\IntroSection\Groups;


use VirgilSecurity\Customizer\Fields\ImageField;
use VirgilSecurity\Customizer\Fields\LinkField;
use VirgilSecurity\Customizer\Fields\Repeater\NumberField;
use VirgilSecurity\Customizer\Fields\TextareaField;
use VirgilSecurity\Customizer\Fields\TextField;
use VirgilSecurity\Customizer\Src\FieldsGroup;

class IntroServicesGroup extends FieldsGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setField(new TextField('label', __('Label')));
        $this->setField(new ImageField('image', __('Image')));
        $this->setField(new LinkField('url', __('URL')));
        $this->setField(new TextField('tooltip_headline', __('Tooltip title')));
        $this->setField(new TextareaField('tooltip_text', __('Tooltip text')));
        $this->setField(new NumberField('width', __('Image width')));
        $this->setField(new NumberField('height', __('Image height')));

        $this->setRowLabel('label', __('intro service'));

        parent::__construct('hp_intro_services', __('Intro services'));
    }
}
