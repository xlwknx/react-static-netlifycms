<?php

namespace VirgilSecurity\Customizer\FrontPage\AnnouncementSection\Modifications\Sections;


use VirgilSecurity\Customizer\FrontPage\AnnouncementSection\Modifications\MessageMod;

use VirgilSecurity\Customizer\Src\BaseSectionMods;

class AnnouncementSectionMods extends BaseSectionMods
{
    protected $messageMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getMessageMod(),
            ]
        );
    }


    public function getMessageMod()
    {
        if ($this->messageMod == null) {
            $this->messageMod = new MessageMod();
        }

        return $this->messageMod;
    }


}
