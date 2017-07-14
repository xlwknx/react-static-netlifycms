<?php

namespace VirgilSecurity\Customizer\FeaturesPage;


use VirgilSecurity\Customizer\Src\BaseSection;
use WP_Query;

abstract class FeaturesPageSection extends BaseSection
{
    public function getActiveCallback(WP_Query $wp_query)
    {
        return $wp_query->is_page('features');
    }
}
