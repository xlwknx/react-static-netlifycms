<?php

namespace VirgilSecurity\Customizer\ContactsPage\MapSection\Modifications\Sections;


use VirgilSecurity\Customizer\ContactsPage\MapSection\Modifications\MapAddressMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class MapSectionMods extends BaseSectionMods
{
    protected $MapAddressMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getMapAddressMod(),
            ]
        );
    }


    public function getMapAddressMod()
    {
        if ($this->MapAddressMod == null) {
            $this->MapAddressMod = new MapAddressMod();
        }

        return $this->MapAddressMod;
    }


}
