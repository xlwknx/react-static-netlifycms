<?php

namespace VirgilSecurity\Models;


use VirgilSecurity\Models\PricingPage\ConclusionSectionModel;
use VirgilSecurity\Models\PricingPage\EnterpriseSectionModel;
use VirgilSecurity\Models\PricingPage\IncludesSectionModel;
use VirgilSecurity\Models\PricingPage\IntroSectionModel;

use VirgilSecurity\Models\Src\LayoutModel;


class PricingPageModel extends LayoutModel
{
    public function IntroSection()
    {
        return new IntroSectionModel();
    }


    public function EnterpriseSection()
    {
        return new EnterpriseSectionModel();
    }


    public function IncludesSection()
    {
        return new IncludesSectionModel();
    }


    public function ConclusionSection()
    {
        return new ConclusionSectionModel();
    }
}