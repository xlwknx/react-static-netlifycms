<?php

namespace VirgilSecurity\Customizer\Fields;


class IconSelectField extends SelectField
{
    protected $multiple = 0;

    protected $default = 'none';


    public function getChoices()
    {
        return [
            'none' => __('None'),

            'arrow_right_black' => __('Arrow right black'),
            'arrow_right_white' => __('Arrow right white'),
            'arrow_top_white'   => __('Arrow top white'),

            'book_black' => __('Book black'),
            'book_red'   => __('Book red'),
            'book_white' => __('Book white'),

            'bookmark_red' => __('Bookmark red'),

            'case_red' => __('Case red'),

            'check_grey'  => __('Check grey'),
            'check_red'   => __('Check red'),
            'check_white' => __('Check white'),

            'clock_grey' => __('Clock grey'),

            'close_red' => __('Close red'),

            'facebook'       => __('Facebook'),
            'facebook_white' => __('Facebook white'),

            'geo_white' => __('Geo white'),

            'github'       => __('Github'),
            'github_black' => __('Github black'),
            'github_white' => __('Github white'),

            'help_white' => __('Help white'),

            'linkedin'       => __('Linkedin'),
            'linkedin_red'   => __('Linkedin red'),
            'linkedin_white' => __('Linkedin white'),

            'mail_red' => __('Mail red'),

            'medium'       => __('Medium'),
            'medium_red'   => __('Medium red'),
            'medium_white' => __('Medium white'),

            'menu_red' => __('Menu red'),

            'shield_red' => __('Shield red'),

            'twitter'       => __('Twitter'),
            'twitter_red'   => __('Twitter red'),
            'twitter_white' => __('Twitter white'),

            'warning_white' => __('Warning white'),
        ];
    }


    public function getLabel()
    {
        return __('Select icon');
    }
}
