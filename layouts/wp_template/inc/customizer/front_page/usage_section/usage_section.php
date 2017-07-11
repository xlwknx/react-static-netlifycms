<?php

namespace VirgilSecurity\Customizer\FrontPage\UsageSection;


use VirgilSecurity\Customizer\FrontPage\FrontPageSection;

use VirgilSecurity\Templates\FrontPage\UsageSectionTemplate;

class UsageSection extends FrontPageSection
{
    protected $optional = 1;

    protected $priority = 30;

    protected $selector = '.page .usage .wrapper .usageContentBlock .blockMsg';


    public function getSection()
    {
        return 'hp_usage_section';
    }


    public function getTitle()
    {
        return __('Usage Section');
    }


    public function getDescription()
    {
        return __('Customize usage section');
    }


    public function getSectionTemplate()
    {
        return new UsageSectionTemplate();
    }
}
