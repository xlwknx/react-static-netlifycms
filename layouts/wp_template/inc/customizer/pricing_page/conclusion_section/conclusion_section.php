<?php

namespace VirgilSecurity\Customizer\PricingPage\ConclusionSection;


use VirgilSecurity\Customizer\PricingPage\PricingPageSection;

use VirgilSecurity\Templates\PricingPage\ConclusionSectionTemplate;

class ConclusionSection extends PricingPageSection
{
    protected $optional = 1;

    protected $priority = 25;

    protected $selector = '.page .conclusion';


    public function getSection()
    {
        return 'pricing_page_conclusion_section';
    }


    public function getTitle()
    {
        return __('Conclusion Section');
    }


    public function getDescription()
    {
        return __('Customize conclusion section');
    }


    public function getSectionTemplate()
    {
        return new ConclusionSectionTemplate();
    }
}
