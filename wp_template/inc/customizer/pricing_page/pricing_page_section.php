<?php

namespace VirgilSecurity\Customizer\PricingPage;


use VirgilSecurity\Customizer\Src\BaseSection;

use WP_Query;

abstract class PricingPageSection extends BaseSection
{
    public function getActiveCallback(WP_Query $wp_query)
    {
        return $wp_query->is_page('pricing');
    }
}
