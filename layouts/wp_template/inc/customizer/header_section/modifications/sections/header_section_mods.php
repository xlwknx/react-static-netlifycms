<?php

namespace VirgilSecurity\Customizer\HeaderSection\Modifications\Sections;


use VirgilSecurity\Customizer\HeaderSection\Modifications\AuthLinksMod;
use VirgilSecurity\Customizer\HeaderSection\Modifications\LogoImageMod;
use VirgilSecurity\Customizer\HeaderSection\Modifications\MenuCodeMod;

use VirgilSecurity\Customizer\HeaderSection\Modifications\MobileAuthLinksMod;
use VirgilSecurity\Customizer\HeaderSection\Modifications\MobileLinkTextMod;
use VirgilSecurity\Customizer\HeaderSection\Modifications\MobileLinkUrlMod;
use VirgilSecurity\Customizer\HeaderSection\Modifications\MobileMenuCodeMod;
use VirgilSecurity\Customizer\Src\BaseSectionMods;


class HeaderSectionMods extends BaseSectionMods
{
    protected $logoImageMod;
    protected $menuCodeMod;
    protected $authLinksMod;
    protected $mobileMenuCodeMod;
    protected $mobileLinkUrlMod;
    protected $mobileLinkTextMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getLogoImageMod(),
                $this->getMenuCodeMod(),
                $this->getAuthLinksMod(),
                $this->getMobileLinkUrlMod(),
                $this->getMobileMenuCodeMod(),
                $this->getMobileLinkTextMod(),
            ]
        );
    }


    public function getLogoImageMod()
    {
        if ($this->logoImageMod == null) {
            $this->logoImageMod = new LogoImageMod();
        }

        return $this->logoImageMod;
    }


    public function getMenuCodeMod()
    {
        if ($this->menuCodeMod == null) {
            $this->menuCodeMod = new MenuCodeMod();
        }

        return $this->menuCodeMod;
    }


    public function getAuthLinksMod()
    {
        if ($this->authLinksMod == null) {
            $this->authLinksMod = new AuthLinksMod();
        }

        return $this->authLinksMod;
    }


    public function getMobileLinkUrlMod()
    {
        if ($this->mobileLinkUrlMod == null) {
            $this->mobileLinkUrlMod = new MobileLinkUrlMod();
        }

        return $this->mobileLinkUrlMod;
    }


    public function getMobileMenuCodeMod()
    {
        if ($this->mobileMenuCodeMod == null) {
            $this->mobileMenuCodeMod = new MobileMenuCodeMod();
        }

        return $this->mobileMenuCodeMod;
    }


    public function getMobileLinkTextMod()
    {
        if ($this->mobileLinkTextMod == null) {
            $this->mobileLinkTextMod = new MobileLinkTextMod();
        }

        return $this->mobileLinkTextMod;
    }
}
