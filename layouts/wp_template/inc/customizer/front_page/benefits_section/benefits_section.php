<?php

namespace VirgilSecurity\Customizer\FrontPage\BenefitsSection;


use VirgilSecurity\Customizer\FrontPage\FrontPageSection;

use VirgilSecurity\Templates\FrontPage\BenefitsSectionTemplate;

class BenefitsSection extends FrontPageSection
{
    protected $optional = 1;

    protected $priority = 31;

    protected $selector = '.page .benefits .wrapper .benefitsContentBlock';


    public function getSection()
    {
        return 'hp_benefits_section';
    }


    public function getTitle()
    {
        return __('Benefits Section');
    }


    public function getDescription()
    {
        return __('Customize benefits section');
    }


    public function getSectionTemplate()
    {
        return new BenefitsSectionTemplate();
    }
}
