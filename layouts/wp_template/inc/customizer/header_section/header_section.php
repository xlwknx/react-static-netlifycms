<?php

namespace VirgilSecurity\Customizer\HeaderSection;


use VirgilSecurity\Customizer\Src\BaseSection;
use VirgilSecurity\Templates\Src\TemplateInterface;
use VirgilSecurity\Templates\Base\HeaderSectionTemplate;

class HeaderSection extends BaseSection
{
    protected $optional = true;

    protected $priority = 25;

    protected $selector = '.page .header';


    public function getSection()
    {
        return 'header_section';
    }


    public function getTitle()
    {
        return __('Header Section');
    }


    public function getDescription()
    {
        return __('Change logo or other header related information here');
    }


    /**
     * @return TemplateInterface
     */
    public function getSectionTemplate()
    {
        return new HeaderSectionTemplate();
    }
}
