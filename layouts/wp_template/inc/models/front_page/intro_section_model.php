<?php

namespace VirgilSecurity\Models\FrontPage;


use VirgilSecurity\Models\Src\BaseModel;

class IntroSectionModel extends BaseModel
{

    public function IsShow()
    {
        return get_theme_mod('is_enabled_hp_intro_section', true);
    }


    public function Headline()
    {
        $msgTextMod = virgilsecurity_get_hp_intro_msg_text();

        if ($msgTextMod->isEnabled()) {
            return [
                'text' => $msgTextMod->getValue(),
            ];
        }
    }


    public function Links()
    {
        $intro_links = virgilsecurity_get_hp_intro_links();

        if ($intro_links->isEnabled()) {
            $values = (array)$intro_links->getValue();

            return array_filter(
                $values,
                function ($value) {
                    return $value['is_hidden'] == false;
                }
            );
        }
    }


    public function Langs()
    {
        $intro_langs = virgilsecurity_get_hp_intro_langs();

        if ($intro_langs->isEnabled()) {
            $values = (array)$intro_langs->getValue();

            return array_filter(
                $values,
                function ($value) {
                    return $value['is_hidden'] == false;
                }
            );
        }
    }
}
