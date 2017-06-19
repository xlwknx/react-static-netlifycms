<?php
namespace VirgilSecurity\Customizer\Hp\IntroSection\Groups;


use VirgilSecurity\Customizer\Groups\LinksGroup;

class IntroLinksGroup extends LinksGroup
{
    protected $priority = 2;


    public function __construct()
    {
        $this->setRowLabel('link_text', __('intro link'));

        parent::__construct('hp_intro_section_links', __('Intro links'));
    }
}
