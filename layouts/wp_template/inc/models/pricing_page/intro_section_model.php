<?php

namespace VirgilSecurity\Models\PricingPage;


use VirgilSecurity\Customizer\PricingPage\IntroSection\Modifications\Sections\IntroSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class IntroSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_pricing_page_intro_section';

    /** @var IntroSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new IntroSectionMods();
    }


    public function Headline()
    {
        $mod = $this->sectionMods->getIntroHeadlineMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Text()
    {
        $mod = $this->sectionMods->getIntroTextMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Plans()
    {
        $modList = $this->sectionMods->getIntroPlansListMod();

        $values = (array)$modList->getValue();

        foreach ($values as &$value) {
            $value['link'] = [
                'link_url'         => $value['link_url'],
                'link_text'        => $value['link_text'],
                'link_is_disabled' => $value['is_link_disabled'],
                'link_button_skin' => $value['link_skin'],
            ];
        }


        if ($modList->isEnabled()) {
            return $this->filterCollection(
                $values,
                [
                    'features_list'          => [[$this, 'textModValueToList']],
                    'features_list_disabled' => [[$this, 'textModValueToList']],
                ]
            );
        }
    }
}
