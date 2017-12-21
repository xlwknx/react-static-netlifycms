<?php

namespace VirgilSecurity\Customizer\PricingPage\EnterpriseSection;


use VirgilSecurity\Customizer\PricingPage\PricingPageSection;

use VirgilSecurity\Templates\PricingPage\EnterpriseSectionTemplate;

class EnterpriseSection extends PricingPageSection
{
    protected $optional = 1;

    protected $priority = 25;

    protected $selector = '.pricingPage .enterprise';


    public function getSection()
    {
        return 'pricing_page_enterprise_section';
    }


    public function getTitle()
    {
        return __('Enterprise Section');
    }


    public function getDescription()
    {
        return __('Customize enterprise section');
    }


    public function getSectionTemplate()
    {
        return new EnterpriseSectionTemplate();
    }
}
