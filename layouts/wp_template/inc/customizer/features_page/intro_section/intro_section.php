<?php

namespace VirgilSecurity\Customizer\FeaturesPage\IntroSection;


use VirgilSecurity\Customizer\FeaturesPage\FeaturesPageSection;

use VirgilSecurity\Templates\FeaturesPage\IntroSectionTemplate;

class IntroSection extends FeaturesPageSection
{
    protected $optional = 1;

    protected $priority = 25;

    protected $selector = '.featuresPage .intro';


    public function getSection()
    {
        return 'features_page_intro_section';
    }


    public function getTitle()
    {
        return __('Intro Section');
    }


    public function getDescription()
    {
        return __('Customize intro section');
    }


    public function getSectionTemplate()
    {
        return new IntroSectionTemplate();
    }
}
