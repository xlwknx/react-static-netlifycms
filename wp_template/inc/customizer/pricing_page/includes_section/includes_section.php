<?php

namespace VirgilSecurity\Customizer\PricingPage\IncludesSection;


use VirgilSecurity\Customizer\PricingPage\PricingPageSection;

use VirgilSecurity\Templates\PricingPage\IncludesSectionTemplate;

class IncludesSection extends PricingPageSection
{
    protected $optional = 1;

    protected $priority = 25;

    protected $selector = '.pricingPage .includes';


    public function getSection()
    {
        return 'pricing_page_includes_section';
    }


    public function getTitle()
    {
        return __('Includes Section');
    }


    public function getDescription()
    {
        return __('Customize includes section');
    }


    public function getSectionTemplate()
    {
        return new IncludesSectionTemplate();
    }
}
