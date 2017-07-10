<?php

namespace VirgilSecurity\Customizer\FrontPage\UsageSection\Modifications\Sections;


use VirgilSecurity\Customizer\FrontPage\UsageSection\Modifications\UsageHeadlineMod;
use VirgilSecurity\Customizer\FrontPage\UsageSection\Modifications\UsageTextMod;
use VirgilSecurity\Customizer\FrontPage\UsageSection\Modifications\UsageUsageListMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class UsageSectionMods extends BaseSectionMods
{
    protected $UsageHeadlineMod;
    protected $UsageTextMod;
    protected $UsageUsageListMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getUsageHeadlineMod(),
                $this->getUsageTextMod(),
                $this->getUsageUsageListMod(),
            ]
        );
    }


    public function getUsageHeadlineMod()
    {
        if ($this->UsageHeadlineMod == null) {
            $this->UsageHeadlineMod = new UsageHeadlineMod();
        }

        return $this->UsageHeadlineMod;
    }


    public function getUsageTextMod()
    {
        if ($this->UsageTextMod == null) {
            $this->UsageTextMod = new UsageTextMod();
        }

        return $this->UsageTextMod;
    }


    public function getUsageUsageListMod()
    {
        if ($this->UsageUsageListMod == null) {
            $this->UsageUsageListMod = new UsageUsageListMod();
        }

        return $this->UsageUsageListMod;
    }


}
