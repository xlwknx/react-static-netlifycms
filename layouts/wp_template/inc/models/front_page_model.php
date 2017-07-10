<?php

namespace VirgilSecurity\Models;


use VirgilSecurity\Models\Src\LayoutModel;

use VirgilSecurity\Models\FrontPage\IntroSectionModel;
use VirgilSecurity\Models\FrontPage\UseCasesSectionModel;
use VirgilSecurity\Models\FrontPage\ServicesSectionModel;

class FrontPageModel extends LayoutModel
{

    public function IntroSection()
    {
        return new IntroSectionModel();
    }


    public function UseCasesSection()
    {
        return new UseCasesSectionModel();
    }


    public function ServicesSection()
    {
        return new ServicesSectionModel();
    }
}
