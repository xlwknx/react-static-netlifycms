<?php

namespace VirgilSecurity\Models;


use VirgilSecurity\Models\Src\LayoutModel;

use VirgilSecurity\Models\FrontPage\IntroSectionModel;

class FrontPageModel extends LayoutModel
{

    public function IntroSection()
    {
        return new IntroSectionModel();
    }
}
