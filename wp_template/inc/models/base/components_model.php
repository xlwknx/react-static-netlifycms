<?php

namespace VirgilSecurity\Models\Base;


use VirgilSecurity\Models\Src\BaseModel;

class ComponentsModel extends BaseModel
{
    public function GoogleTagManager()
    {
        if (function_exists('gtm4wp_the_gtm_tag')) {
            return gtm4wp_the_gtm_tag();
        }
    }
}
