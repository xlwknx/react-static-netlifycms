<?php

namespace VirgilSecurity\Customizer\FrontPage\ServicesSection\Modifications\Sections;


use VirgilSecurity\Customizer\FrontPage\ServicesSection\Modifications\ServicesCaptionMod;
use VirgilSecurity\Customizer\FrontPage\ServicesSection\Modifications\ServicesHeadlineMod;
use VirgilSecurity\Customizer\FrontPage\ServicesSection\Modifications\ServicesListMod;
use VirgilSecurity\Customizer\FrontPage\ServicesSection\Modifications\ServicesTextMod;
use VirgilSecurity\Customizer\Src\BaseSectionMods;

class ServicesSectionMods extends BaseSectionMods
{
    protected $servicesCaptionMod;
    protected $servicesTextMod;
    protected $servicesHeadlineMod;
    protected $servicesListMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getServicesCaptionMod(),
            ]
        );
    }


    public function getServicesCaptionMod()
    {
        if ($this->servicesCaptionMod == null) {
            $this->servicesCaptionMod = new ServicesCaptionMod();
        }

        return $this->servicesCaptionMod;
    }


    public function getServicesTextMod()
    {
        if ($this->servicesTextMod == null) {
            $this->servicesTextMod = new ServicesTextMod();
        }

        return $this->servicesTextMod;
    }


    public function getServicesHeadlineMod()
    {
        if ($this->servicesHeadlineMod == null) {
            $this->servicesHeadlineMod = new ServicesHeadlineMod();
        }

        return $this->servicesHeadlineMod;
    }


    public function getServicesListMod()
    {
        if ($this->servicesListMod == null) {
            $this->servicesListMod = new ServicesListMod();
        }

        return $this->servicesListMod;
    }

}
