<?php

namespace VirgilSecurity\Customizer\PricingPage\ConclusionSection\Groups;


use VirgilSecurity\Customizer\Groups\LinksGroup;

class ConclusionLinksGroup extends LinksGroup
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Links");
    }
}
