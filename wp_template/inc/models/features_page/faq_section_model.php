<?php

namespace VirgilSecurity\Models\FeaturesPage;


use VirgilSecurity\Customizer\FeaturesPage\FaqSection\Modifications\Sections\FaqSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class FaqSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_features_page_faq_section';

    /** @var FaqSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new FaqSectionMods();
    }


    public function Caption()
    {
        $mod = $this->sectionMods->getFaqCaptionMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Collection()
    {
        $mod = $this->sectionMods->getFaqQuestionsListMod();

        if ($mod->isEnabled()) {
            return (array)$mod->getValue();
        }
    }


    public function Form()
    {
        $form = [];

        $headlineMod = $this->sectionMods->getFaqAskQuestionHeadlineMod();
        $formCodeMod = $this->sectionMods->getFaqAskQuestionMod();

        if ($headlineMod->isEnabled()) {
            $form['headline'] = $headlineMod->getValue();
        }

        if ($formCodeMod->isEnabled()) {
            $form['code'] = $formCodeMod->getValue();
        }

        return $form;
    }
}
