<?php

namespace VirgilSecurity\Customizer\Fields;


class SocialIconsSelectField extends SelectField
{
    protected $multiple = 0;


    public function getChoices()
    {
        return [
            'none'          => __('None'),
            'icon-facebook' => __('Facebook'),
            'icon-github'   => __('Github'),
            'icon-twitter'  => __('Twitter'),
            'icon-linkedin' => __('Linkedin'),
            'icon-medium'   => __('Medium'),
        ];
    }


    public function getLabel()
    {
        return __('Select social icon');
    }
}
