<?php

namespace VirgilSecurity\Customizer\FrontPage\UseCasesSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class UseCasesHeadlineField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Headline message");
    }
}
