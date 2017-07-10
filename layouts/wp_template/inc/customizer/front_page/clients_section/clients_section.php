<?php

namespace VirgilSecurity\Customizer\FrontPage\ClientsSection;


use VirgilSecurity\Customizer\FrontPage\FrontPageSection;

use VirgilSecurity\Templates\FrontPage\ClientsSectionTemplate;

class ClientsSection extends FrontPageSection
{
    protected $optional = 1;

    protected $priority = 29;

    protected $selector = '.page .clients';


    public function getSection()
    {
        return 'hp_clients_section';
    }


    public function getTitle()
    {
        return __('Clients Section');
    }


    public function getDescription()
    {
        return __('Customize clients section');
    }


    public function getSectionTemplate()
    {
        return new ClientsSectionTemplate();
    }
}
