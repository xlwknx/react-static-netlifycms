<?php

namespace VirgilSecurity\Models\FrontPage;


use VirgilSecurity\Customizer\FrontPage\IntroSection\Modifications\Sections\IntroSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class IntroSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_hp_intro_section';

    /** @var IntroSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new IntroSectionMods();
    }


    public function Headline()
    {
        $msgTextMod = $this->sectionMods->getIntroMsgMod();

        if ($msgTextMod->isEnabled()) {
            return [
                'text' => $msgTextMod->getValue(),
            ];
        }
    }


    public function Links()
    {
        $introLinks = $this->sectionMods->getIntroLinksMod();

        if ($introLinks->isEnabled()) {
            $values = (array)$introLinks->getValue();

            return $this->filterCollection($values);
        }
    }


    public function Services()
    {
        $introServicesMod = $this->sectionMods->getIntroServicesMod();
        $introServicesHeadlineMod = $this->sectionMods->getIntroServicesHeadlineMod();

        $services = [];

        if ($introServicesMod->isEnabled()) {

            $services['collection'] = $this->filterCollection(
                (array)$introServicesMod->getValue(),
                [
                    'image' => [
                        [$this, 'imageModValueToModel'],
                    ],
                ]
            );
        }

        if ($introServicesHeadlineMod->isEnabled()) {
            $services['headline'] = $introServicesHeadlineMod->getValue();
        }

        return $services;
    }
}
