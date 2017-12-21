<?php

namespace VirgilSecurity\Models\ContactsPage;


use VirgilSecurity\Customizer\ContactsPage\ContactUsSection\Modifications\Sections\ContactUsSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class ContactUsSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_contacts_page_contact_us_section';

    /** @var ContactUsSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new ContactUsSectionMods();
    }


    public function Headline()
    {
        $mod = $this->sectionMods->getContactUsHeadlineMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Text()
    {
        $mod = $this->sectionMods->getContactUsTextMod();

        if ($mod->isEnabled()) {
            return $mod->getValue();
        }
    }


    public function Form()
    {
        $titleMod = $this->sectionMods->getContactUsFormTitleMod();
        $iconMod = $this->sectionMods->getContactUsFormIconMod();
        $codeMod = $this->sectionMods->getContactUsFormCodeMod();

        $model = [];

        if ($titleMod->isEnabled()) {
            $model['title'] = $titleMod->getValue();
        }

        if ($iconMod->isEnabled()) {
            $model['icon'] = $iconMod->getValue();
        }

        if ($codeMod->isEnabled()) {
            $model['code'] = $codeMod->getValue();
        }

        return $model;
    }


    public function Contacts()
    {
        $headlineMod = $this->sectionMods->getContactUsContactHeadlineMod();
        $fieldsListMod = $this->sectionMods->getContactUsContactFieldsMod();
        $socialListMod = $this->sectionMods->getContactUsContactSocialsMod();

        $model = [];

        if ($headlineMod->isEnabled()) {
            $model['headline'] = $headlineMod->getValue();
        }

        if ($fieldsListMod->isEnabled()) {
            $fields = $fieldsListMod->getValue();

            $typeToIcon = [
                'address' => 'geo_white',
                'email'   => 'help_white',
                'phone'   => 'phone_white',
            ];

            foreach ($fields as &$field) {
                $field['icon'] = $typeToIcon[$field['type']];
            }

            $model['fields'] = $this->filterCollection($fields);
        }

        if ($socialListMod->isEnabled()) {
            $model['socials'] = $this->filterCollection($socialListMod->getValue());
        }

        return $model;
    }
}
