<?php

namespace VirgilSecurity\Models\FrontPage;


use VirgilSecurity\Customizer\FrontPage\ClientsSection\Modifications\Sections\ClientsSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class ClientsSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_hp_clients_section';

    /** @var ClientsSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new ClientsSectionMods();
    }


    public function Link()
    {
        $mod = $this->sectionMods->getClientsLinkMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Collection()
    {
        $mod = $this->sectionMods->getClientsListMod();

        if ($mod->isEnabled()) {
            return $this->filterCollection(
                (array)$mod->getValue(),
                [
                    'image' => [
                        [$this, 'imageModValueToModel'],
                    ],
                ]
            );
            
        }
    }
}
