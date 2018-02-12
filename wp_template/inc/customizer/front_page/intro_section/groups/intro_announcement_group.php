<?php

namespace VirgilSecurity\Customizer\FrontPage\IntroSection\Groups;


use VirgilSecurity\Customizer\Fields\LinkField;
use VirgilSecurity\Customizer\Fields\TextField;
use VirgilSecurity\Customizer\Src\FieldsGroup;

class IntroAnnouncementGroup extends FieldsGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setField(new TextField('text', __('Text')));
        $this->setField(new LinkField('url', __('URL')));

        $this->setRowLabel('label', __('announcement'));

        parent::__construct('hp_intro_announcement', __('Announcements'));
    }
}
