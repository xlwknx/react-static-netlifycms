<?php
namespace VirgilSecurity\Customizer\Hp\IntroSection\Modifications\Sections;


use VirgilSecurity\Customizer\Hp\IntroSection\Modifications\IntroLangsMod;
use VirgilSecurity\Customizer\Hp\IntroSection\Modifications\IntroLinksMod;
use VirgilSecurity\Customizer\Hp\IntroSection\Modifications\IntroMsgMod;
use VirgilSecurity\Customizer\Src\BaseSectionMods;

class IntroSectionMods extends BaseSectionMods
{
    protected $introLinksMod;
    protected $introMsgMod;
    protected $introLangsMod;


    public function setupDefaults()
    {
        $this->setup(
            [
                $this->getIntroLinksMod(),
                $this->getIntroMsgMod(),
                $this->getIntroLangsMod()
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


    public function getIntroLangsMod()
    {
        if ($this->introLangsMod == null) {
            $this->introLangsMod = new IntroLangsMod();
        }

        return $this->introLangsMod;
    }

}
