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

set_theme_mod('is_enabled_contacts_page_contact_us_headline', false);
set_theme_mod('is_enabled_pricing_page_intro_headline', false);

/** @var array $pricingPlansList */
$pricingPlansList = get_theme_mod('pricing_page_intro_plans_list');

foreach ($pricingPlansList as &$item) {
    if (isset($item['link_skin'])) {
        $item['link_skin'] = str_replace("_static", "", $item['link_skin']);
    }
}

set_theme_mod('pricing_page_intro_plans_list', $pricingPlansList);

/** @var array $conclusionLinks */
$conclusionLinks = get_theme_mod('pricing_page_conclusion_links');

foreach ($conclusionLinks as &$item) {
    if (isset($item['link_button_skin'])) {
        $item['link_button_skin'] = "raised_red";
    }
}

set_theme_mod('pricing_page_conclusion_links', $conclusionLinks);

set_theme_mod('pricing_page_conclusion_headline', 'Ready to get started?<br>Get in touch, or create an account.');


