<?php

namespace VirgilSecurity\Models\Base;


use Timber\Post;
use VirgilSecurity\Models\Src\BaseModel;

class CommonModel extends BaseModel
{
    public function Post()
    {
        return new Post();
    }


    public function HasSiteIcon()
    {
        return has_site_icon();
    }


    public function StaticPageClass()
    {
        return get_static_page_class();
    }
}
