<?php

namespace VirgilSecurity\Customizer\FrontPage;


use VirgilSecurity\Customizer\Src\BaseSection;

abstract class FrontPageSection extends BaseSection
{
    public function getActiveCallback()
    {
        return is_front_page();
    }
}
