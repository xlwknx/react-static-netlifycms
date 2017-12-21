<?php

namespace VirgilSecurity\Customizer\PricingPage\IntroSection\Fields;


use VirgilSecurity\Customizer\Fields\SelectField;

class IntroPlanDurationListField extends SelectField
{
    protected $multiple = 0;

    protected $default = 'year';


    public function getChoices()
    {
        return [
            'year' => __('Year'),
            'mo'   => __('Month'),
        ];
    }


    public function getLabel()
    {
        return __('Plan duration list');
    }
}

