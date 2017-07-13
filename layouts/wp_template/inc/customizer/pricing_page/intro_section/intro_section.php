<?php

namespace VirgilSecurity\Customizer\PricingPage\IntroSection;


use VirgilSecurity\Customizer\PricingPage\PricingPageSection;

use VirgilSecurity\Templates\PricingPage\IntroSectionTemplate;

class IntroSection extends PricingPageSection
{
    protected $optional = 1;

    protected $priority = 25;

    protected $selector = '.pricingPage .intro';


    public function getSection()
    {
        return 'pricing_page_intro_section';
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
