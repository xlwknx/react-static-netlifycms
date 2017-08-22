<?php

namespace VirgilSecurity\Customizer\FeaturesPage\FaqSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class FaqAskQuestionFormCodeField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Form shortcode");
    }
}
