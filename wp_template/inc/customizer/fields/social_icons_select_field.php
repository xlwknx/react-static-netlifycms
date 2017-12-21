<?php

namespace VirgilSecurity\Customizer\Fields;


class SocialIconsSelectField extends SelectField
{
    protected $multiple = 0;


    public function getChoices()
    {
        return [
            'none'          => __('None'),

            'facebook'       => __('Facebook'),
            'facebook_white' => __('Facebook white'),

            'github'       => __('Github'),
            'github_black' => __('Github black'),
            'github_white' => __('Github white'),


            'twitter'       => __('Twitter'),
            'twitter_red'   => __('Twitter red'),
            'twitter_white' => __('Twitter white'),


            'linkedin'       => __('Linkedin'),
            'linkedin_red'   => __('Linkedin red'),
            'linkedin_white' => __('Linkedin white'),


            'medium'       => __('Medium'),
            'medium_red'   => __('Medium red'),
            'medium_white' => __('Medium white'),
        ];
    }


    public function getLabel()
    {
        return __('Select social icon');
    }
}
