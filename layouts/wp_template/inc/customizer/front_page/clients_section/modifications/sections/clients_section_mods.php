<?php

namespace VirgilSecurity\Customizer\FrontPage\ClientsSection\Modifications\Sections;


use VirgilSecurity\Customizer\FrontPage\ClientsSection\Modifications\ClientsListMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class ClientsSectionMods extends BaseSectionMods
{
    protected $ClientsListMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getClientsListMod(),
            ]
        );
    }


    public function getClientsListMod()
    {
        if ($this->ClientsListMod == null) {
            $this->ClientsListMod = new ClientsListMod();
        }

        return $this->ClientsListMod;
    }


}
