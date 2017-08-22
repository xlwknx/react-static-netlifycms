<?php

namespace VirgilSecurity\Customizer\FeaturesPage\ConclusionSection\Fields;

use VirgilSecurity\Customizer\Fields\TextareaField;

class ConclusionHeadlineField extends TextareaField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Conclusion headline");
    }
}
