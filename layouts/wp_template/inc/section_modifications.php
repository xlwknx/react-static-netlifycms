<?php
namespace VirgilSecurity;


use VirgilSecurity\Customizer\HeaderSection\Modifications\Sections\HeaderSectionMods;

class SectionModifications
{
    /** @var  HeaderSectionMods */
    protected $headerSectionMods;


    public function __construct()
    {
        $this->headerSectionMods = new HeaderSectionMods();
    }


    public function getHeaderSectionMods()
    {
        return $this->headerSectionMods;
    }


    public function setupDefaults()
    {
        $this->headerSectionMods->setupDefaults();
    }
}
