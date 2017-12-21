<?php

namespace VirgilSecurity\Models\FrontPage;


use VirgilSecurity\Customizer\FrontPage\AnnouncementSection\Modifications\Sections\AnnouncementSectionMods;
use VirgilSecurity\Models\Src\BaseSectionModel;

class AnnouncementSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_hp_announcement_section';

    /** @var AnnouncementSectionMods */
    protected $announcementSectionMods;


    public function __construct()
    {
        $this->announcementSectionMods = new AnnouncementSectionMods();
    }


    public function Message()
    {
        $mod = $this->announcementSectionMods->getMessageMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }
}
