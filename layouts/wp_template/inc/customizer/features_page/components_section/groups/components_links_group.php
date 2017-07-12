<?php

namespace VirgilSecurity\Customizer\FeaturesPage\ComponentsSection\Groups;


use VirgilSecurity\Customizer\Fields\ButtonSkinSelectField;
use VirgilSecurity\Customizer\Fields\IconSelectField;
use VirgilSecurity\Customizer\Fields\LinkField;
use VirgilSecurity\Customizer\Fields\TextareaField;

use VirgilSecurity\Customizer\Src\FieldsGroup;

class ComponentsLinksGroup extends FieldsGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setField(new TextareaField('link_text', __('Link Text')));
        $this->setField(new LinkField('link_url', __('Link URL')));
        $this->setField(new ButtonSkinSelectField('link_button_skin'));
        $this->setField(new IconSelectField('link_icon'));

        $this->setRowLabel('link_url', __('link'));


        parent::__construct('features_page_components_links', __('Components links'));
    }
}
