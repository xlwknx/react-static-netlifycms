<?php

namespace VirgilSecurity\Customizer\FooterSection\Modifications\Sections;


use VirgilSecurity\Customizer\FooterSection\Modifications\LogoDescriptionMod;
use VirgilSecurity\Customizer\FooterSection\Modifications\LogoImageMod;
use VirgilSecurity\Customizer\FooterSection\Modifications\SocialLinksMod;
use VirgilSecurity\Customizer\Src\BaseSectionMods;


class FooterSectionMods extends BaseSectionMods
{
    protected $logoImageMod;

    protected $logoDescriptionMod;

    protected $socialLinks;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getLogoImageMod(),
                $this->getLogoDescription(),
                $this->getSocialLinksMod(),
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


    public function getLogoDescription()
    {
        if ($this->logoDescriptionMod == null) {
            $this->logoDescriptionMod = new LogoDescriptionMod();
        }

        return $this->logoDescriptionMod;
    }


    public function getSocialLinksMod()
    {
        if ($this->socialLinks == null) {
            $this->socialLinks = new SocialLinksMod();
        }

        return $this->socialLinks;
    }

}
