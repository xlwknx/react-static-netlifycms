<?php

namespace VirgilSecurity\Customizer\FeaturesPage\ComponentsSection;


use VirgilSecurity\Customizer\FeaturesPage\FeaturesPageSection;

use VirgilSecurity\Templates\FeaturesPage\ComponentsSectionTemplate;

class ComponentsSection extends FeaturesPageSection
{
    protected $optional = 1;

    protected $priority = 26;

    protected $selector = '.featuresPage .components';


    public function getSection()
    {
        return 'features_page_components_section';
    }


    public function getTitle()
    {
        return __('Components Section');
    }


    public function getDescription()
    {
        return __('Customize components section');
    }


    public function getSectionTemplate()
    {
        return new ComponentsSectionTemplate();
    }
}
