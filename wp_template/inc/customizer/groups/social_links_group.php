<?php

namespace VirgilSecurity\Customizer\Groups;


use VirgilSecurity\Customizer\Fields\LinkField;
use VirgilSecurity\Customizer\Fields\SocialIconsSelectField;
use VirgilSecurity\Customizer\Fields\TextField;
use VirgilSecurity\Customizer\Src\FieldsGroup;

class SocialLinksGroup extends FieldsGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setField(new TextField('link_text', __('Link Text')));
        $this->setField(new LinkField('link_url', __('Link URL')));
        $this->setField(new SocialIconsSelectField('link_icon'));

        $this->setRowLabel('link_text', __('social link'));

        parent::__construct('footer_social_links', __('Social links'));
    }
}
