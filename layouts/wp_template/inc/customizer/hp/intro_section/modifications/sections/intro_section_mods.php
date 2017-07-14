<?php
namespace VirgilSecurity\Customizer\Hp\IntroSection\Modifications\Sections;


use VirgilSecurity\Customizer\Hp\IntroSection\Modifications\IntroLinksMod;
use VirgilSecurity\Customizer\Hp\IntroSection\Modifications\IntroMsgMod;
use VirgilSecurity\Customizer\Src\BaseSectionMods;

class IntroSectionMods extends BaseSectionMods
{
    protected $introLinksMod;
    protected $introMsgMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getIntroLinksMod(),
                $this->getIntroMsgMod(),
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

}
