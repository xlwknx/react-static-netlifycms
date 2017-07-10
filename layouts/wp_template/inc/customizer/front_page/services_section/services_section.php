<?php

namespace VirgilSecurity\Customizer\FrontPage\ServicesSection;


use VirgilSecurity\Customizer\Src\BaseSection;
use VirgilSecurity\Templates\FrontPage\ServicesSectionTemplate;


class ServicesSection extends BaseSection
{
    protected $optional = true;

    protected $priority = 28;

    protected $selector = '.page .services';


    public function getSection()
    {
        return 'hp_services_section';
    }


    public function getTitle()
    {
        return __('Services Section');
    }


    public function getDescription()
    {
        return __('Customize services section');
    }


    public function getSectionTemplate()
    {
        return new ServicesSectionTemplate();
    }


    public function getActiveCallback()
    {
        return is_front_page();
    }
}
