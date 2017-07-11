<?php

namespace VirgilSecurity\Customizer\FrontPage\UseCasesSection;


use VirgilSecurity\Customizer\FrontPage\FrontPageSection;

use VirgilSecurity\Templates\FrontPage\UseCasesSectionTemplate;

class UseCasesSection extends FrontPageSection
{
    protected $optional = true;

    protected $priority = 27;

    protected $selector = '.page .useCases .wrapper .useCasesContentBlock .blockMsg .blockMsg-headline';


    public function getSection()
    {
        return 'hp_use_cases_section';
    }


    public function getTitle()
    {
        return __('Use Cases Section');
    }


    public function getDescription()
    {
        return __('Customize use cases section');
    }


    public function getSectionTemplate()
    {
        return new UseCasesSectionTemplate();
    }
}
