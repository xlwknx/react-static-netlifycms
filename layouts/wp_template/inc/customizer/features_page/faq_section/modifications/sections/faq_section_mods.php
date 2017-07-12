<?php

namespace VirgilSecurity\Customizer\FeaturesPage\FaqSection\Modifications\Sections;


use VirgilSecurity\Customizer\FeaturesPage\FaqSection\Modifications\FaqCaptionMod;
use VirgilSecurity\Customizer\FeaturesPage\FaqSection\Modifications\FaqQuestionsListMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class FaqSectionMods extends BaseSectionMods
{
    protected $FaqCaptionMod;
    protected $FaqQuestionsListMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getFaqCaptionMod(),
                $this->getFaqQuestionsListMod(),
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


}
