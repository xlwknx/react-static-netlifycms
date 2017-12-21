<?php

namespace VirgilSecurity\Customizer\FeaturesPage\ComponentsSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class ComponentsHeadlineField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Components headline");
    }
}
