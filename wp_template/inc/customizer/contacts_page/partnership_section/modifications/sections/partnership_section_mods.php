<?php

namespace VirgilSecurity\Customizer\ContactsPage\PartnershipSection\Modifications\Sections;


use VirgilSecurity\Customizer\ContactsPage\PartnershipSection\Modifications\PartnershipHeadlineMod;
use VirgilSecurity\Customizer\ContactsPage\PartnershipSection\Modifications\PartnershipTextMod;
use VirgilSecurity\Customizer\ContactsPage\PartnershipSection\Modifications\PartnershipContactsListMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class PartnershipSectionMods extends BaseSectionMods
{
    protected $PartnershipHeadlineMod;
    protected $PartnershipTextMod;
    protected $PartnershipContactsListMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getPartnershipHeadlineMod(),
                $this->getPartnershipTextMod(),
                $this->getPartnershipContactsListMod(),
            ]
        );
    }


    public function getPartnershipHeadlineMod()
    {
        if ($this->PartnershipHeadlineMod == null) {
            $this->PartnershipHeadlineMod = new PartnershipHeadlineMod();
        }

        return $this->PartnershipHeadlineMod;
    }


    public function getPartnershipTextMod()
    {
        if ($this->PartnershipTextMod == null) {
            $this->PartnershipTextMod = new PartnershipTextMod();
        }

        return $this->PartnershipTextMod;
    }


    public function getPartnershipContactsListMod()
    {
        if ($this->PartnershipContactsListMod == null) {
            $this->PartnershipContactsListMod = new PartnershipContactsListMod();
        }

        return $this->PartnershipContactsListMod;
    }


}
