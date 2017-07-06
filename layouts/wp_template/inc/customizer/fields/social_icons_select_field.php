<?php

namespace VirgilSecurity\Customizer\Fields;


class SocialIconsSelectField extends SelectField
{
    protected $multiple = 0;


    public function getChoices()
    {
        return [
            'none'                 => __('None'),
            'fa-facebook-official' => __('Facebook'),
            'fa-github'            => __('Github'),
            'fa-twitter'           => __('Twitter'),
            'fa-linkedin-square'   => __('Linkedin'),
            'fa-medium'            => __('Medium'),
        ];
    }


    public function getLabel()
    {
        return __('Select social icon');
    }
}
