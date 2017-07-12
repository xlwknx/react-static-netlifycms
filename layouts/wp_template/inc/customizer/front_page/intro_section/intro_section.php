<?php

namespace VirgilSecurity\Customizer\FrontPage\IntroSection;


use VirgilSecurity\Customizer\FrontPage\FrontPageSection;

use VirgilSecurity\Templates\FrontPage\IntroSectionTemplate;

class IntroSection extends FrontPageSection
{
    protected $optional = true;

    protected $priority = 26;

    protected $selector = '.homePage .intro';


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
}
