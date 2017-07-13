<?php

namespace VirgilSecurity\Models;


use VirgilSecurity\Models\PricingPage\EnterpriseSectionModel;
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
}
