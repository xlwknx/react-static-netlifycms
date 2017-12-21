<?php

namespace VirgilSecurity\Customizer\FrontPage\UseCasesSection\Groups;


use VirgilSecurity\Customizer\Groups\LinksGroup;

class UseCasesLinksGroup extends LinksGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setRowLabel('link_text', __('use cases link'));

        parent::__construct('hp_use_cases_section_links', __('Use cases links'));
    }
}
