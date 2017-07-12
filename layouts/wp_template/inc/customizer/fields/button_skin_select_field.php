<?php

namespace VirgilSecurity\Customizer\Fields;


class ButtonSkinSelectField extends SelectField
{
    protected $multiple = 0;

    protected $default = 'none';


    public function getChoices()
    {
        return [
            'none' => __('None'),

            'flat'       => __('Flat'),
            'flat_white' => __('Flat White'),

            'raised_red'               => __('Raised red'),
            'raised_red_static'        => __('Raised red static'),
            'raised_red_border'        => __('Raised red, border'),
            'raised_red_border_static' => __('Raised red, border static'),

            'raised_white'        => __('Raised white'),
            'raised_white_static' => __('Raised white static'),

            'raised_white_border'        => __('Raised white, border'),
            'raised_white_border_black'  => __('Raised white, border black'),
            'raised_white_border_static' => __('Raised white, border static'),

            'disabled' => __('Disabled'),
        ];
    }


    public function getLabel()
    {
        return __('Select button skin');
    }
}
