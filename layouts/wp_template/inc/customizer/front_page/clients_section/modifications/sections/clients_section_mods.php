<?php

namespace VirgilSecurity\Customizer\FrontPage\ClientsSection\Modifications\Sections;


use VirgilSecurity\Customizer\FrontPage\ClientsSection\Modifications\ClientsLinkMod;
use VirgilSecurity\Customizer\FrontPage\ClientsSection\Modifications\ClientsListMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class ClientsSectionMods extends BaseSectionMods
{
    protected $ClientsListMod;

    protected $ClientsLinkMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getClientsListMod(),
                $this->getClientsLinkMod(),
            ]
        );
    }


    public function getClientsLinkMod()
    {
        if ($this->ClientsLinkMod == null) {
            $this->ClientsLinkMod = new ClientsLinkMod();
        }

        return $this->ClientsLinkMod;
    }


    public function getClientsListMod()
    {
        if ($this->ClientsListMod == null) {
            $this->ClientsListMod = new ClientsListMod();
        }

        return $this->ClientsListMod;
    }


}
