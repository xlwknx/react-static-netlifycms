<?php

namespace VirgilSecurity\Customizer\FrontPage\IntroSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class IntroAnnounceMsgField extends TextField
{
    public function getLabel()
    {
        return __("Announcement text");
    }
}
