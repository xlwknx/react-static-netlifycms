<?php

namespace VirgilSecurity\Customizer\FrontPage\ConclusionSection\Groups;


use VirgilSecurity\Customizer\Groups\LinksGroup;

class ConclusionLinksGroup extends LinksGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setRowLabel('link_text', __('conclusion link'));

        parent::__construct('hp_conclusion_links_list', __('Conclusion links'));
    }
}
