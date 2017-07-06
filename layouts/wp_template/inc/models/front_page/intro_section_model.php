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

            return array_filter(
                $values,
                function ($value) {
                    return $value['is_hidden'] == false;
                }
            );
        }
    }


    public function Langs()
    {
        $introLangsMod = $this->sectionMods->getIntroLangsMod();

        if ($introLangsMod->isEnabled()) {
            $values = (array)$introLangsMod->getValue();

            return array_filter(
                $values,
                function ($value) {
                    return $value['is_hidden'] == false;
                }
            );
        }
    }
}
