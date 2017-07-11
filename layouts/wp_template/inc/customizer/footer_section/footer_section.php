<?php

namespace VirgilSecurity\Customizer\FooterSection;


use VirgilSecurity\Customizer\Src\BaseSection;
use VirgilSecurity\Templates\Base\FooterSectionTemplate;
use VirgilSecurity\Templates\Src\TemplateInterface;
use VirgilSecurity\Templates\Base\HeaderSectionTemplate;

class FooterSection extends BaseSection
{
    protected $optional = true;

    protected $priority = 200;

    protected $selector = '.page .footer .footer-top .wrapper';


    public function getSection()
    {
        return 'footer_section';
    }


    public function getTitle()
    {
        return __('Footer Section');
    }


    public function getDescription()
    {
        return __('Change logo or other footer related information here');
    }


    /**
     * @return TemplateInterface
     */
    public function getSectionTemplate()
    {
        return new FooterSectionTemplate();
    }
}
