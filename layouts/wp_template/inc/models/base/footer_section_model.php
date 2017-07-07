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
}
