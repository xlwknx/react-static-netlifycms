<?php

namespace VirgilSecurity\Customizer\FrontPage;


use VirgilSecurity\Customizer\Src\BaseSection;

use WP_Query;

abstract class FrontPageSection extends BaseSection
{
    public function getActiveCallback(WP_Query $wp_query)
    {
        return $wp_query->is_front_page();
    }
}
