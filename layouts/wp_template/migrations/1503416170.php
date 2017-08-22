<?php

$loadDefaultContent = function ($modName) {
    $file_path_parts = [
        'customizer',
        'default_content',
    ];

    $file_path = implode(DIRECTORY_SEPARATOR, $file_path_parts);

    $file = get_theme_file_path($file_path . DIRECTORY_SEPARATOR . $modName . '.php');

    if (file_exists($file)) {
        $defaultContent = include $file;

        return $defaultContent;
    }
};


set_theme_mod("features_page_conclusion_headline", $loadDefaultContent("features_page_conclusion_headline"));
set_theme_mod("features_page_conclusion_links", $loadDefaultContent("features_page_conclusion_links"));
set_theme_mod(
    "features_page_faq_ask_question_headline",
    $loadDefaultContent("features_page_faq_ask_question_headline")
);

remove_theme_mod("contacts_page_contact_us_headline");
