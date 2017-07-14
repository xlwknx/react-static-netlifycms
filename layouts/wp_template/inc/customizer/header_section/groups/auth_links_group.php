<?php
namespace VirgilSecurity\Customizer\HeaderSection\Groups;


use VirgilSecurity\Customizer\Fields\LinkField;
use VirgilSecurity\Customizer\Fields\TextField;

use VirgilSecurity\Customizer\Groups\FieldsGroup;

class AuthLinksGroup extends FieldsGroup
{
    protected $priority = 3;


    public function __construct()
    {
        $this->setField(new TextField('link_text', __('Link Text')));
        $this->setField(new LinkField('link_url', __('Link URL')));
        $this->setField(new TextField('link_class', __('Link CSS Class')));

        $this->setRowLabel('link_text', __('auth link'));

        parent::__construct('header_auth_links', __('Auth links'));
    }
}
