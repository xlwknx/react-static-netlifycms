<?php

namespace VirgilSecurity\Customizer\FrontPage\UseCasesSection\Fields;


use VirgilSecurity\Customizer\Fields\TextareaField;

class UseCasesCaptionField extends TextareaField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Caption message");
    }
}
