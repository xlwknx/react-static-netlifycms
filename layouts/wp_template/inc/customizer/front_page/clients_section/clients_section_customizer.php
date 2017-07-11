<?php

namespace VirgilSecurity\Customizer\FrontPage\ClientsSection;


use VirgilSecurity\Customizer\FrontPage\ClientsSection\Fields\ClientsLinkField;
use VirgilSecurity\Customizer\FrontPage\ClientsSection\Groups\ClientsListGroup;
use VirgilSecurity\Customizer\FrontPage\ClientsSection\Modifications\Sections\ClientsSectionMods;

use WP_Customize_Manager;

class ClientsSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(ClientsSectionMods $clientsSectionMods)
    {
        $section = new ClientsSection($this->config, $this->wpCustomizer);

        $section->addField(
            ClientsLinkField::createWithMod($clientsSectionMods->getClientsLinkMod())
        );

        $section->addField(
            ClientsListGroup::createWithMod($clientsSectionMods->getClientsListMod())
        );


        return $section;
    }
}
