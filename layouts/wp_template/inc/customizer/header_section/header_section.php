<?php

namespace VirgilSecurity\Customizer\HeaderSection;


use VirgilSecurity\Customizer\Src\BaseSection;

class HeaderSection extends BaseSection
{
    protected $optional = true;

    protected $priority = 25;


    public function getSection()
    {
        return 'header_section';
    }


    public function getTitle()
    {
        return __('Header Section');
    }


    public function getDescription()
    {
        return __('Change logo or other header related information here');
    }


    public function getPartialRefresh()
    {
        return [
            'selector'        => '.page .header',
            'render_callback' => function () {
                get_template_part('template-sections/header/header_section');
            },
        ];
    }
}
