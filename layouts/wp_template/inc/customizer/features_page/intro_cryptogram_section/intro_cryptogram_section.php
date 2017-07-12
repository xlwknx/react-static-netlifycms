<?php

namespace VirgilSecurity\Customizer\FeaturesPage\IntroCryptogramSection;


use VirgilSecurity\Customizer\FeaturesPage\FeaturesPageSection;

use VirgilSecurity\Templates\FeaturesPage\IntroCryptogramSectionTemplate;

class IntroCryptogramSection extends FeaturesPageSection
{
    protected $optional = 1;

    protected $priority = 25;

    protected $selector = '.page .intro';


    public function getSection()
    {
        return 'features_page_intro_cryptogram_section';
    }


    public function getTitle()
    {
        return __('Intro Cryptogram Section');
    }


    public function getDescription()
    {
        return __('Customize intro cryptogram');
    }


    public function getSectionTemplate()
    {
        return new IntroCryptogramSectionTemplate();
    }
}
