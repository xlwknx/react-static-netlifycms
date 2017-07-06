<?php

namespace VirgilSecurity\Models\Base;


use VirgilSecurity\Models\Src\BaseModel;

class HeaderSectionModel extends BaseModel
{

    public function IsShow()
    {
        return get_theme_mod('is_enabled_header_section', true);
    }


    public function HeaderMenu()
    {
        return virgilsecurity_get_header_menu();
    }


    public function AuthLinks()
    {
        $authLinksMod = virgilsecurity_get_header_auth_links();

        if ($authLinksMod->isEnabled()) {
            return $authLinksMod->getValue();
        }
    }


    public function Logo()
    {
        $logoImageMod = virgilsecurity_get_header_logo_image();

        if ($logoImageMod->isEnabled()) {
            return [
                'image' => $logoImageMod->getValue(),
                'url'   => site_url(),
            ];
        }
    }
}
