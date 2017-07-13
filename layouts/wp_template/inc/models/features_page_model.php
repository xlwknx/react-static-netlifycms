<?php

namespace VirgilSecurity\Models;


use VirgilSecurity\Models\FeaturesPage\ComponentsSectionModel;
use VirgilSecurity\Models\FeaturesPage\CryptogramSectionModel;
use VirgilSecurity\Models\FeaturesPage\FeaturesSectionModel;
use VirgilSecurity\Models\FeaturesPage\IntroSectionModel;

use VirgilSecurity\Models\Src\LayoutModel;


class FeaturesPageModel extends LayoutModel
{
    public function IntroSection()
    {
        return new IntroSectionModel();
    }


    public function CryptogramSection()
    {
        return new CryptogramSectionModel();
    }


    public function ComponentsSection()
    {
        return new ComponentsSectionModel();
    }


    public function FeaturesSection()
    {
        return new FeaturesSectionModel();
    }
}
