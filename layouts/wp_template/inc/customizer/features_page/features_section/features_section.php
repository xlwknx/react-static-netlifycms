<?php

namespace VirgilSecurity\Customizer\FeaturesPage\FeaturesSection;


use VirgilSecurity\Customizer\FeaturesPage\FeaturesPageSection;

use VirgilSecurity\Templates\FeaturesPage\FeaturesSectionTemplate;

class FeaturesSection extends FeaturesPageSection
{
    protected $optional = 1;

    protected $priority = 27;

    protected $selector = '.page .features';


    public function getSection()
    {
        return 'features_page_features_section';
    }


    public function getTitle()
    {
        return __('Features Section');
    }


    public function getDescription()
    {
        return __('Customize features section');
    }


    public function getSectionTemplate()
    {
        return new FeaturesSectionTemplate();
    }
}
