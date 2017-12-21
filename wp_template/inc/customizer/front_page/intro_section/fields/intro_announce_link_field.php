<?php

namespace VirgilSecurity\Customizer\FrontPage\IntroSection\Fields;


use VirgilSecurity\Customizer\Fields\LinkField;

class IntroAnnounceLinkField extends LinkField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Announcement link");
    }
}
