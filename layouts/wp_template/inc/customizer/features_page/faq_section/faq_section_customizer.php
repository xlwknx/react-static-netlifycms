<?php

namespace VirgilSecurity\Customizer\FeaturesPage\FaqSection;


use VirgilSecurity\Customizer\FeaturesPage\FaqSection\Fields\FaqAskQuestionFormCodeField;
use VirgilSecurity\Customizer\FeaturesPage\FaqSection\Fields\FaqAskQuestionFormHeadlineField;
use VirgilSecurity\Customizer\FeaturesPage\FaqSection\Fields\FaqCaptionField;
use VirgilSecurity\Customizer\FeaturesPage\FaqSection\Modifications\Sections\FaqSectionMods;

use VirgilSecurity\Customizer\FeaturesPage\FaqSection\Groups\FaqQuestionsListGroup;
use WP_Customize_Manager;

class FaqSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(FaqSectionMods $faqSectionMods)
    {
        $section = new FaqSection($this->config, $this->wpCustomizer);

        $section->addField(
            FaqCaptionField::createWithMod($faqSectionMods->getFaqCaptionMod())
        );

        $section->addField(
            FaqQuestionsListGroup::createWithMod($faqSectionMods->getFaqQuestionsListMod())
        );

        $section->addField(
            FaqAskQuestionFormHeadlineField::createWithMod($faqSectionMods->getFaqAskQuestionHeadlineMod())
        );

        $section->addField(
            FaqAskQuestionFormCodeField::createWithMod($faqSectionMods->getFaqAskQuestionMod())
        );

        return $section;
    }
}
