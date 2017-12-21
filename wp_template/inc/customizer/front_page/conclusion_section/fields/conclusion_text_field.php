<?php

namespace VirgilSecurity\Customizer\FrontPage\ConclusionSection\Fields;


use VirgilSecurity\Customizer\Fields\TextareaField;

class ConclusionTextField extends TextareaField
{
    public function getLabel()
    {
        return __("Text");
    }
}
