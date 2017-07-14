<?php

namespace VirgilSecurity\Models\FrontPage;


use VirgilSecurity\Customizer\FrontPage\ServicesSection\Modifications\Sections\ServicesSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class ServicesSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_hp_services_section';

    /** @var ServicesSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new ServicesSectionMods();
    }


    public function Headline()
    {
        $mod = $this->sectionMods->getServicesHeadlineMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Text()
    {
        $mod = $this->sectionMods->getServicesTextMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Caption()
    {
        $mod = $this->sectionMods->getServicesCaptionMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Collection()
    {
        $mod = $this->sectionMods->getServicesListMod();

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
