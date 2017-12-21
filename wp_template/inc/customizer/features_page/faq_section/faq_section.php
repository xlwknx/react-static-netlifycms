<?php

namespace VirgilSecurity\Customizer\FeaturesPage\FaqSection;


use VirgilSecurity\Customizer\FeaturesPage\FeaturesPageSection;

use VirgilSecurity\Templates\FeaturesPage\FaqSectionTemplate;

class FaqSection extends FeaturesPageSection
{
    protected $optional = 1;

    protected $priority = 28;

    protected $selector = '.featuresPage .faq';


    public function getSection()
    {
        return 'features_page_faq_section';
    }


    public function getTitle()
    {
        return __('Faq Section');
    }


    public function getDescription()
    {
        return __('Customize FAQ section');
    }


    public function getSectionTemplate()
    {
        return new FaqSectionTemplate();
    }
}
