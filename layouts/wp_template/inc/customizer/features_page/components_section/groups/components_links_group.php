<?php

namespace VirgilSecurity\Customizer\FeaturesPage\ComponentsSection\Groups;


use VirgilSecurity\Customizer\Groups\LinksGroup;

class ComponentsLinksGroup extends LinksGroup
{
    protected $optional = true;


    public function getLabel()
    {
        return __('Components links');
    }
}
