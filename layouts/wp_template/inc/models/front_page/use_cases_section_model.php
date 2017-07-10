<?php

namespace VirgilSecurity\Models\FrontPage;


use VirgilSecurity\Customizer\FrontPage\UseCasesSection\Modifications\Sections\UseCasesSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class UseCasesSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_hp_use_cases_section';

    /** @var UseCasesSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new UseCasesSectionMods();
    }


    //public function Headline()
    //{
    //    $msgTextMod = $this->sectionMods->getIntroMsgMod();
    //
    //    if ($msgTextMod->isEnabled()) {
    //        return [
    //            'text' => $msgTextMod->getValue(),
    //        ];
    //    }
    //}
    //
    //
    //public function Links()
    //{
    //    $introLinks = $this->sectionMods->getIntroLinksMod();
    //
    //    if ($introLinks->isEnabled()) {
    //        $values = (array)$introLinks->getValue();
    //
    //        return $this->filterCollection($values);
    //    }
    //}
    //
    //
    //public function Langs()
    //{
    //    $introLangsMod = $this->sectionMods->getIntroLangsMod();
    //
    //    if ($introLangsMod->isEnabled()) {
    //
    //        return $this->filterCollection(
    //            (array)$introLangsMod->getValue(),
    //            [
    //                'lang_image' => [
    //                    [$this, 'imageModValueToModel'],
    //                ],
    //            ]
    //        );
    //    }
    //}
}
