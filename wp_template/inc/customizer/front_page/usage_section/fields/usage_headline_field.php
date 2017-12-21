<?php

namespace VirgilSecurity\Customizer\FrontPage\UsageSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class UsageHeadlineField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __('Headline');
    }
}
