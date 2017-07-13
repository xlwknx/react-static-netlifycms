<?php

namespace VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Modifications\Sections;


use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Modifications\ContactUsHeadlineMod;
use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Modifications\ContactUsTextMod;
use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Modifications\ContactUsFormTitleMod;
use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Modifications\ContactUsFormIconMod;
use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Modifications\ContactUsFormCodeMod;
use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Modifications\ContactUsContactHeadlineMod;
use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Modifications\ContactUsContactFieldsMod;
use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Modifications\ContactUsContactSocialsMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class ContactUsSectionMods extends BaseSectionMods
{
    protected $ContactUsHeadlineMod;
    protected $ContactUsTextMod;
    protected $ContactUsFormTitleMod;
    protected $ContactUsFormIconMod;
    protected $ContactUsFormCodeMod;
    protected $ContactUsContactHeadlineMod;
    protected $ContactUsContactFieldsMod;
    protected $ContactUsContactSocialsMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getContactUsHeadlineMod(),
                $this->getContactUsTextMod(),
                $this->getContactUsFormTitleMod(),
                $this->getContactUsFormIconMod(),
                $this->getContactUsFormCodeMod(),
                $this->getContactUsContactHeadlineMod(),
                $this->getContactUsContactFieldsMod(),
                $this->getContactUsContactSocialsMod(),
            ]
        );
    }


    public function getContactUsHeadlineMod()
    {
        if ($this->ContactUsHeadlineMod == null) {
            $this->ContactUsHeadlineMod = new ContactUsHeadlineMod();
        }

        return $this->ContactUsHeadlineMod;
    }


    public function getContactUsTextMod()
    {
        if ($this->ContactUsTextMod == null) {
            $this->ContactUsTextMod = new ContactUsTextMod();
        }

        return $this->ContactUsTextMod;
    }


    public function getContactUsFormTitleMod()
    {
        if ($this->ContactUsFormTitleMod == null) {
            $this->ContactUsFormTitleMod = new ContactUsFormTitleMod();
        }

        return $this->ContactUsFormTitleMod;
    }


    public function getContactUsFormIconMod()
    {
        if ($this->ContactUsFormIconMod == null) {
            $this->ContactUsFormIconMod = new ContactUsFormIconMod();
        }

        return $this->ContactUsFormIconMod;
    }


    public function getContactUsFormCodeMod()
    {
        if ($this->ContactUsFormCodeMod == null) {
            $this->ContactUsFormCodeMod = new ContactUsFormCodeMod();
        }

        return $this->ContactUsFormCodeMod;
    }


    public function getContactUsContactHeadlineMod()
    {
        if ($this->ContactUsContactHeadlineMod == null) {
            $this->ContactUsContactHeadlineMod = new ContactUsContactHeadlineMod();
        }

        return $this->ContactUsContactHeadlineMod;
    }


    public function getContactUsContactFieldsMod()
    {
        if ($this->ContactUsContactFieldsMod == null) {
            $this->ContactUsContactFieldsMod = new ContactUsContactFieldsMod();
        }

        return $this->ContactUsContactFieldsMod;
    }


    public function getContactUsContactSocialsMod()
    {
        if ($this->ContactUsContactSocialsMod == null) {
            $this->ContactUsContactSocialsMod = new ContactUsContactSocialsMod();
        }

        return $this->ContactUsContactSocialsMod;
    }


}
