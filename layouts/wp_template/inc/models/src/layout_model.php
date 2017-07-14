<?php

namespace VirgilSecurity\Models\Src;


use VirgilSecurity\Models\Base\CommonModel;
use VirgilSecurity\Models\Base\FooterSectionModel;
use VirgilSecurity\Models\Base\HeaderSectionModel;

abstract class LayoutModel extends BaseModel
{

    public function FooterSection()
    {
        return new FooterSectionModel();
    }


    public function HeaderSection()
    {
        return new HeaderSectionModel();
    }


    public function Common()
    {
        return new CommonModel();
    }
}
