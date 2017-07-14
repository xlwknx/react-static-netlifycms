<?php

namespace VirgilSecurity\Customizer\FooterSection\Modifications\Sections;


use VirgilSecurity\Customizer\FooterSection\Modifications\CopyrightMod;
use VirgilSecurity\Customizer\FooterSection\Modifications\EmailMod;
use VirgilSecurity\Customizer\FooterSection\Modifications\LogoDescriptionMod;
use VirgilSecurity\Customizer\FooterSection\Modifications\LogoImageMod;
use VirgilSecurity\Customizer\FooterSection\Modifications\NavCodeMod;
use VirgilSecurity\Customizer\FooterSection\Modifications\PolicyLinkMod;
use VirgilSecurity\Customizer\FooterSection\Modifications\PolicyLinkTextMod;
use VirgilSecurity\Customizer\FooterSection\Modifications\SocialLinksMod;
use VirgilSecurity\Customizer\Src\BaseSectionMods;


class FooterSectionMods extends BaseSectionMods
{
    protected $logoImageMod;

    protected $logoDescriptionMod;

    protected $socialLinks;

    protected $navCodeMod;

    protected $emailMod;

    protected $policyLinkTextMod;

    protected $policyLinkMod;

    protected $copyrightMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getLogoImageMod(),
                $this->getLogoDescription(),
                $this->getSocialLinksMod(),
                $this->getNavCodeMod(),
                $this->getEmailMod(),
                $this->getPolicyLinkTextMod(),
                $this->getPolicyLinkMod(),
                $this->getCopyrightMod(),
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


    public function getNavCodeMod()
    {
        if ($this->navCodeMod == null) {
            $this->navCodeMod = new NavCodeMod();
        }

        return $this->navCodeMod;
    }


    public function getEmailMod()
    {
        if ($this->emailMod == null) {
            $this->emailMod = new EmailMod();
        }

        return $this->emailMod;
    }


    public function getPolicyLinkTextMod()
    {
        if ($this->policyLinkTextMod == null) {
            $this->policyLinkTextMod = new PolicyLinkTextMod();
        }

        return $this->policyLinkTextMod;
    }


    public function getPolicyLinkMod()
    {
        if ($this->policyLinkMod == null) {
            $this->policyLinkMod = new PolicyLinkMod();
        }

        return $this->policyLinkMod;
    }


    public function getCopyrightMod()
    {
        if ($this->copyrightMod == null) {
            $this->copyrightMod = new CopyrightMod();
        }

        return $this->copyrightMod;
    }
}
