<?php

namespace VirgilSecurity\Customizer\FeaturesPage\ConclusionSection;


use VirgilSecurity\Customizer\FeaturesPage\FeaturesPageSection;

use VirgilSecurity\Templates\FeaturesPage\ConclusionSectionTemplate;

class ConclusionSection extends FeaturesPageSection
{
    protected $optional = 1;

    protected $priority = 29;

    protected $selector = '.featuresPage .conclusion';


    public function getSection()
    {
        return 'features_page_conclusion_section';
    }


    public function getTitle()
    {
        return __('Conclusion section');
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
