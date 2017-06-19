<?php
namespace VirgilSecurity\Customizer\Fields;


class ButtonSkinSelectField extends SelectField
{
    protected $multiple = 0;


    public function getChoices()
    {
        return [
            'none'                => __('None'),
            'flat_white'          => __('Flat White'),
            'raised_white_border' => __('Raised White Border'),
            'github'              => __('Github'),
            'raised_red'          => __('Raised red'),
        ];
    }


    public function getLabel()
    {
        return __('Select button skin');
    }
}
