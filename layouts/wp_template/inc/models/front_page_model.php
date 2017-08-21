<?php

namespace VirgilSecurity\Models;


use VirgilSecurity\Models\Src\LayoutModel;

use VirgilSecurity\Models\FrontPage\AnnouncementSectionModel;
use VirgilSecurity\Models\FrontPage\IntroSectionModel;
use VirgilSecurity\Models\FrontPage\UseCasesSectionModel;
use VirgilSecurity\Models\FrontPage\ServicesSectionModel;
use VirgilSecurity\Models\FrontPage\ClientsSectionModel;
use VirgilSecurity\Models\FrontPage\UsageSectionModel;
use VirgilSecurity\Models\FrontPage\BenefitsSectionModel;
use VirgilSecurity\Models\FrontPage\ConclusionSectionModel;

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


    public function ClientsSection()
    {
        return new ClientsSectionModel();
    }


    public function UsageSection()
    {
        return new UsageSectionModel();
    }


    public function BenefitsSection()
    {
        return new BenefitsSectionModel();
    }


    public function ConclusionSection()
    {
        return new ConclusionSectionModel();
    }


    public function AnnouncementSection()
    {
        return new AnnouncementSectionModel();
    }
}
