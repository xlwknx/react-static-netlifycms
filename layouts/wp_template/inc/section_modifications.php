<?php

namespace VirgilSecurity;


use VirgilSecurity\Customizer\FeaturesPage\FeaturesPageSectionMods;
use VirgilSecurity\Customizer\FooterSection\Modifications\Sections\FooterSectionMods;
use VirgilSecurity\Customizer\HeaderSection\Modifications\Sections\HeaderSectionMods;

use VirgilSecurity\Customizer\FrontPage\FrontPageSectionMods;

class SectionModifications
{
    const SECTIONS_INIT_MOD = 'is_sections_mod_init';

    private static $instance;

    /** @var  HeaderSectionMods */
    protected $headerSectionMods;

    /** @var FrontPageSectionMods */
    protected $frontPageSectionMods;

    /** @var FooterSectionMods */
    protected $footerSectionMods;


    public function __construct()
    {
        $this->headerSectionMods = new HeaderSectionMods();
        $this->frontPageSectionMods = new FrontPageSectionMods();
        $this->featuresPageSectionMods = new FeaturesPageSectionMods();
        $this->footerSectionMods = new FooterSectionMods();
    }


    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    public function getHeaderSectionMods()
    {
        return $this->headerSectionMods;
    }


    public function getFrontPageSectionMods()
    {
        return $this->frontPageSectionMods;
    }


    public function getFeaturesPageSectionMods()
    {
        return $this->featuresPageSectionMods;
    }


    public function getFooterSectionMods()
    {
        return $this->footerSectionMods;
    }


    public function setupDefaults()
    {
        $this->headerSectionMods->setupDefaults();
        $this->frontPageSectionMods->setupDefaults();
        $this->featuresPageSectionMods->setupDefaults();
        $this->footerSectionMods->setupDefaults();

        set_theme_mod(self::SECTIONS_INIT_MOD, true);
    }


    public function isInitialized()
    {
        return get_theme_mod(self::SECTIONS_INIT_MOD, false);
    }
}
