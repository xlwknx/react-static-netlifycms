<?php

namespace VirgilSecurity\Customizer\HeaderSection\Groups;


use VirgilSecurity\Customizer\Groups\LinksGroup;

class AuthLinksGroup extends LinksGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setRowLabel('link_text', __('auth link'));

        parent::__construct('header_auth_links', __('Auth links'));
    }
}
