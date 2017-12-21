<?php

namespace VirgilSecurity\Models\Base;


use VirgilSecurity\Customizer\HeaderSection\Modifications\Sections\HeaderSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class HeaderSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_header_section';

    /** @var HeaderSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new HeaderSectionMods();
    }


    public function HeaderMenu()
    {
        $menuCodeMod = $this->sectionMods->getMenuCodeMod();

        if ($menuCodeMod->isEnabled()) {
            return $menuCodeMod->getValue();
        }
    }


    public function Mobile()
    {
        $model = [];
        $menuMod = $this->sectionMods->getMobileMenuCodeMod();
        $linkUrlMod = $this->sectionMods->getMobileLinkUrlMod();
        $linkTextMod = $this->sectionMods->getMobileLinkTextMod();

        if ($menuMod->isEnabled()) {
            $model['menu'] = $menuMod->getValue();
        }

        if ($linkUrlMod->isEnabled()) {
            $model['link'] = [
                'url'  => $linkUrlMod->getValue(),
                'text' => $linkTextMod->getValue(),
            ];
        }

        return $model;
    }


    public function AuthLinks()
    {
        $authLinksMod = $this->sectionMods->getAuthLinksMod();

        if ($authLinksMod->isEnabled()) {
            $values = (array)$authLinksMod->getValue();

            return $this->filterCollection($values);
        }
    }


    public function Logo()
    {
        $logoImageMod = $this->sectionMods->getLogoImageMod();

        if ($logoImageMod->isEnabled()) {
            return [
                'image' => $this->imageModValueToModel($logoImageMod->getValue()),
                'url'   => site_url(),
            ];
        }
    }
}
