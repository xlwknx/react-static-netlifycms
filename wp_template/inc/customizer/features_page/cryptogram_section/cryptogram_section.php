<?php

namespace VirgilSecurity\Customizer\FeaturesPage\CryptogramSection;


use VirgilSecurity\Customizer\FeaturesPage\FeaturesPageSection;

use VirgilSecurity\Templates\FeaturesPage\CryptogramSectionTemplate;

class CryptogramSection extends FeaturesPageSection
{
    protected $optional = 1;

    protected $priority = 26;

    protected $selector = '.featuresPage .cryptogram';


    public function getSection()
    {
        return 'features_page_cryptogram_section';
    }


    public function getTitle()
    {
        return __('Cryptogram section');
    }


    public function getDescription()
    {
        return __('Customize cryptogram section');
    }


    public function getSectionTemplate()
    {
        return new CryptogramSectionTemplate();
    }
}
