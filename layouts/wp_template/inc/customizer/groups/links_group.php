<?php

namespace VirgilSecurity\Customizer\Groups;


use VirgilSecurity\Customizer\Fields\ButtonSkinSelectField;
use VirgilSecurity\Customizer\Fields\IconSelectField;
use VirgilSecurity\Customizer\Fields\LinkField;
use VirgilSecurity\Customizer\Fields\TextField;

use VirgilSecurity\Customizer\Src\FieldsGroup;

class LinksGroup extends FieldsGroup
{
    public function __construct($settings = null, $label = null)
    {
        $this->setField(new TextField('link_text', __('Link Text')));
        $this->setField(new LinkField('link_url', __('Link URL')));
        $this->setField(new ButtonSkinSelectField('link_button_skin'));
        $this->setField(new IconSelectField('link_icon'));


        parent::__construct($settings, __($label));
    }
}
