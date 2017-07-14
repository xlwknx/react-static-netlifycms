<?php

namespace VirgilSecurity\Customizer\Hp\IntroSection;


use VirgilSecurity\Customizer\Src\BaseSection;

class IntroSection extends BaseSection
{
    protected $priority = 26;


    public function getSection()
    {
        return 'hp_intro_section';
    }


    public function getTitle()
    {
        return __('Intro Section');
    }


    public function getDescription()
    {
        return __('Customize intro section');
    }


    public function getPartialRefresh()
    {
        return [
            'hp_intro_section' => [
                'selector'        => '.page .intro',
                'render_callback' => function () {
                    get_template_part('template-sections/hp/intro_section');
                },
            ],
        ];
    }


    public function getActiveCallback()
    {
        return is_front_page();
    }
}
