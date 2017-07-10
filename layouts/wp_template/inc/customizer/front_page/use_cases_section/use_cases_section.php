<?php

namespace VirgilSecurity\Customizer\FrontPage\UseCasesSection;


use VirgilSecurity\Customizer\Src\BaseSection;

use VirgilSecurity\Templates\FrontPage\UseCasesSectionTemplate;

class UseCasesSection extends BaseSection
{
    protected $optional = true;

    protected $priority = 27;

    protected $selector = '.page .useCases';


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


    public function getActiveCallback()
    {
        return is_front_page();
    }
}
