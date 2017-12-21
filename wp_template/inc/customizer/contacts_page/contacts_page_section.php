<?php

namespace VirgilSecurity\Customizer\ContactsPage;


use VirgilSecurity\Customizer\Src\BaseSection;

use WP_Query;

abstract class ContactsPageSection extends BaseSection
{
    public function getActiveCallback(WP_Query $wp_query)
    {
        return $wp_query->is_page('contact');
    }
}
