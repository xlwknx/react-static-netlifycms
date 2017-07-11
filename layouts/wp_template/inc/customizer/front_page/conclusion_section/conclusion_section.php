<?php

namespace VirgilSecurity\Customizer\FrontPage\ConclusionSection;


use VirgilSecurity\Customizer\FrontPage\FrontPageSection;

use VirgilSecurity\Templates\FrontPage\ConclusionSectionTemplate;

class ConclusionSection extends FrontPageSection
{
    protected $optional = 1;

    protected $priority = 32;

    protected $selector = '.page .conclusion';


    public function getSection()
    {
        return 'hp_conclusion_section';
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
