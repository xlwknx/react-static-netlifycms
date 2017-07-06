<?php

namespace VirgilSecurity\Customizer\FrontPage\IntroSection;


use VirgilSecurity\Customizer\Src\BaseSection;

use VirgilSecurity\Templates\FrontPage\IntroSectionTemplate;

class IntroSection extends BaseSection
{
    protected $optional = true;

    protected $priority = 26;

    protected $selector = '.page .intro';


    public function getSection()
    {
        return 'hp_intro_section';
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


    public function getActiveCallback()
    {
        return is_front_page();
    }
}
