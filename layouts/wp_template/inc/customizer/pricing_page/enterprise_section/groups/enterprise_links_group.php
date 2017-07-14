<?php

namespace VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Groups;


use VirgilSecurity\Customizer\Groups\LinksGroup;

class EnterpriseLinksGroup extends LinksGroup
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Links");
    }
}
