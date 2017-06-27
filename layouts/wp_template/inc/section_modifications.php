<?php

namespace VirgilSecurity;


use VirgilSecurity\Customizer\HeaderSection\Modifications\Sections\HeaderSectionMods;
use VirgilSecurity\Customizer\Hp\HpSectionMods;

class SectionModifications
{
    const SECTIONS_INIT_MOD = 'is_sections_mod_init';

    /** @var  HeaderSectionMods */
    protected $headerSectionMods;

    /** @var HpSectionMods */
    protected $hpSectionMods;


    public function __construct()
    {
        $this->headerSectionMods = new HeaderSectionMods();
        $this->hpSectionMods = new HpSectionMods();
    }


    public function getHeaderSectionMods()
    {
        return $this->headerSectionMods;
    }


    public function getHpSectionMods()
    {
        return $this->hpSectionMods;
    }


    public function setupDefaults()
    {
        $this->headerSectionMods->setupDefaults();
        $this->hpSectionMods->setupDefaults();

        set_theme_mod(self::SECTIONS_INIT_MOD, true);
    }


    public function isInitialized()
    {
        return get_theme_mod(self::SECTIONS_INIT_MOD, false);
    }
}
