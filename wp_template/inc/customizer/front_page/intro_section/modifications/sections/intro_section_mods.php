<?php

namespace VirgilSecurity\Customizer\FrontPage\IntroSection\Modifications\Sections;


use VirgilSecurity\Customizer\FrontPage\IntroSection\Modifications\IntroAnnounceLinkMod;
use VirgilSecurity\Customizer\FrontPage\IntroSection\Modifications\IntroAnnounceMsgMod;
use VirgilSecurity\Customizer\FrontPage\IntroSection\Modifications\IntroServicesHeadlineMod;
use VirgilSecurity\Customizer\FrontPage\IntroSection\Modifications\IntroServicesMod;
use VirgilSecurity\Customizer\FrontPage\IntroSection\Modifications\IntroLinksMod;
use VirgilSecurity\Customizer\FrontPage\IntroSection\Modifications\IntroMsgMod;
use VirgilSecurity\Customizer\Src\BaseSectionMods;

class IntroSectionMods extends BaseSectionMods
{
    protected $introLinksMod;
    protected $introMsgMod;
    protected $introServicesMod;
    protected $introServicesHeadlineMod;
    protected $introAnnounceMsgMod;
    protected $introAnnounceLinkMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getIntroLinksMod(),
                $this->getIntroMsgMod(),
                $this->getIntroServicesMod(),
                $this->getIntroServicesHeadlineMod(),
                $this->getIntroAnnounceLinkMod(),
                $this->getIntroAnnounceMsgMod(),
            ]
        );
    }


    public function getIntroLinksMod()
    {
        if ($this->introLinksMod == null) {
            $this->introLinksMod = new IntroLinksMod();
        }

        return $this->introLinksMod;
    }


    public function getIntroMsgMod()
    {
        if ($this->introMsgMod == null) {
            $this->introMsgMod = new IntroMsgMod();
        }

        return $this->introMsgMod;
    }


    public function getIntroServicesMod()
    {
        if ($this->introServicesMod == null) {
            $this->introServicesMod = new IntroServicesMod();
        }

        return $this->introServicesMod;
    }


    public function getIntroServicesHeadlineMod()
    {
        if ($this->introServicesHeadlineMod == null) {
            $this->introServicesHeadlineMod = new IntroServicesHeadlineMod();
        }

        return $this->introServicesHeadlineMod;
    }


    public function getIntroAnnounceLinkMod()
    {
        if ($this->introAnnounceLinkMod == null) {
            $this->introAnnounceLinkMod = new IntroAnnounceLinkMod();
        }

        return $this->introAnnounceLinkMod;
    }


    public function getIntroAnnounceMsgMod()
    {
        if ($this->introAnnounceMsgMod == null) {
            $this->introAnnounceMsgMod = new IntroAnnounceMsgMod();
        }

        return $this->introAnnounceMsgMod;
    }

}
