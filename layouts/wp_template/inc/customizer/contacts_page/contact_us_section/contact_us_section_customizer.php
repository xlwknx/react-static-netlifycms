<?php

namespace VirgilSecurity\Customizer\ContactsPage\ContactUsSection;


use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Fields\ContactUsContactHeadlineField;
use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Fields\ContactUsFormCodeField;
use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Fields\ContactUsFormIconField;
use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Fields\ContactUsFormTitleField;
use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Fields\ContactUsTextField;
use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Groups\ContactUsContactFieldsGroup;
use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Groups\ContactUsContactSocialsGroup;

use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Modifications\Sections\ContactUsSectionMods;
use WP_Customize_Manager;

class ContactUsSectionCustomizer
{
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct($config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
    }


    public function getSection(ContactUsSectionMods $contactUsSectionMods)
    {
        $section = new ContactUsSection($this->config, $this->wpCustomizer);

        $section->addField(
            ContactUsTextField::createWithMod($contactUsSectionMods->getContactUsTextMod())
        );

        $section->addField(
            ContactUsFormTitleField::createWithMod($contactUsSectionMods->getContactUsFormTitleMod())
        );

        $section->addField(
            ContactUsFormIconField::createWithMod($contactUsSectionMods->getContactUsFormIconMod())
        );

        $section->addField(
            ContactUsFormCodeField::createWithMod($contactUsSectionMods->getContactUsFormCodeMod())
        );

        $section->addField(
            ContactUsContactHeadlineField::createWithMod($contactUsSectionMods->getContactUsContactHeadlineMod())
        );

        $section->addField(
            ContactUsContactFieldsGroup::createWithMod($contactUsSectionMods->getContactUsContactFieldsMod())
        );

        $section->addField(
            ContactUsContactSocialsGroup::createWithMod($contactUsSectionMods->getContactUsContactSocialsMod())
        );

        return $section;
    }
}
