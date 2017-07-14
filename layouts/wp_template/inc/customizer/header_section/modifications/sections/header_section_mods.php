<?php
namespace VirgilSecurity\Customizer\HeaderSection\Modifications\Sections;


use VirgilSecurity\Customizer\HeaderSection\Modifications\AuthLinksMod;
use VirgilSecurity\Customizer\HeaderSection\Modifications\LogoImageMod;
use VirgilSecurity\Customizer\HeaderSection\Modifications\MenuCodeMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;


class HeaderSectionMods extends BaseSectionMods
{
    protected $logoImageMod;

    protected $menuCodeMod;

    protected $authLinksMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getLogoImageMod(),
                $this->getMenuCodeMod(),
                $this->getAuthLinksMod(),
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
}
