<?php

namespace VirgilSecurity\Models\Base;


use VirgilSecurity\Customizer\FooterSection\Modifications\Sections\FooterSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class FooterSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_footer_section';

    /** @var FooterSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new FooterSectionMods();
    }


    public function Logo()
    {
        $logoImageMod = $this->sectionMods->getLogoImageMod();

        if ($logoImageMod->isEnabled()) {
            return $this->imageModValueToModel($logoImageMod->getValue());
        }
    }


    public function Description()
    {
        $logoDescription = $this->sectionMods->getLogoDescription();

        if ($logoDescription->isEnabled()) {
            return $logoDescription->getValue();
        }
    }


    public function SocialLinks()
    {
        $socialLinks = $this->sectionMods->getSocialLinksMod();

        if ($socialLinks->isEnabled()) {
            $values = (array)$socialLinks->getValue();

            return $this->filterCollection($values);
        }
    }


    public function Navigation()
    {
        $navigation = $this->sectionMods->getNavCodeMod();

        if ($navigation->isEnabled()) {
            return $navigation->getValue();
        }
    }


    public function Email()
    {
        $email = $this->sectionMods->getEmailMod();

        if ($email->isEnabled()) {
            return $email->getValue();
        }
    }


    public function TermsOfUse()
    {
        $termsOfUseLink = $this->sectionMods->getPolicyLinkMod();
        $termsOfUseText = $this->sectionMods->getPolicyLinkTextMod();

        if ($termsOfUseLink->isEnabled()) {
            return new LinkModel($termsOfUseLink->getValue(), $termsOfUseText->getValue());
        }
    }


    public function Copyright()
    {
        $copyright = $this->sectionMods->getCopyrightMod();

        if ($copyright->isEnabled()) {
            return $copyright->getValue();
        }
    }
}
