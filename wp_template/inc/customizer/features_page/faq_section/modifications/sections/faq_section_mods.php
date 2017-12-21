<?php

namespace VirgilSecurity\Customizer\FeaturesPage\FaqSection\Modifications\Sections;


use VirgilSecurity\Customizer\FeaturesPage\FaqSection\Modifications\FaqAskQuestionHeadlineMod;
use VirgilSecurity\Customizer\FeaturesPage\FaqSection\Modifications\FaqAskQuestionMod;
use VirgilSecurity\Customizer\FeaturesPage\FaqSection\Modifications\FaqCaptionMod;
use VirgilSecurity\Customizer\FeaturesPage\FaqSection\Modifications\FaqQuestionsListMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class FaqSectionMods extends BaseSectionMods
{
    protected $FaqCaptionMod;
    protected $FaqQuestionsListMod;
    protected $faqAskQuestionFormMod;
    protected $faqAskQuestionHeadlineMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getFaqCaptionMod(),
                $this->getFaqQuestionsListMod(),
                $this->getFaqAskQuestionMod(),
                $this->getFaqAskQuestionHeadlineMod(),
            ]
        );
    }


    public function getFaqCaptionMod()
    {
        if ($this->FaqCaptionMod == null) {
            $this->FaqCaptionMod = new FaqCaptionMod();
        }

        return $this->FaqCaptionMod;
    }


    public function getFaqQuestionsListMod()
    {
        if ($this->FaqQuestionsListMod == null) {
            $this->FaqQuestionsListMod = new FaqQuestionsListMod();
        }

        return $this->FaqQuestionsListMod;
    }


    public function getFaqAskQuestionMod()
    {
        if ($this->faqAskQuestionFormMod == null) {
            $this->faqAskQuestionFormMod = new FaqAskQuestionMod();
        }

        return $this->faqAskQuestionFormMod;
    }


    public function getFaqAskQuestionHeadlineMod()
    {
        if ($this->faqAskQuestionHeadlineMod == null) {
            $this->faqAskQuestionHeadlineMod = new FaqAskQuestionHeadlineMod();
        }

        return $this->faqAskQuestionHeadlineMod;
    }


}
