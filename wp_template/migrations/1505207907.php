<?php

set_theme_mod('is_enabled_hp_announcement_section', false); //hide top announcement section
set_theme_mod('hp_intro_announce_msg', 'virgil presents noisesocket');
set_theme_mod('hp_intro_announce_link', 'https://github.com/noisesocket/spec');

$featuresPageCryptogramList = get_theme_mod('features_page_cryptogram_list');

$featuresPageCryptogramList[0]['image'] = get_template_directory_uri() .
                                          '/assets/images/content/features-cryptogram-icon.svg';


$featuresPageCryptogramList[2]['image'] = get_template_directory_uri() .
                                          '/assets/images/content/features-cryptogram-icon.svg';

foreach ($featuresPageCryptogramList as &$item) {
    //add each element
    $item['headline'] = '';
    $item['description'] = '';
    $itemsString = str_replace("\n\n", "\n", $item['items']);

    foreach ($itemsList = explode("\n", $itemsString) as &$it) {
        $it = '-' . $it;
    }

    $item['items'] = implode("\n", $itemsList);
}

$featuresPageCryptogramList[0]['headline'] = 'Cryptogram';
$featuresPageCryptogramList[0]['description'] = '<span class="font-red">ECIES</span> iso-18033-2';

$featuresPageCryptogramList[2]['headline'] = 'Cryptogram';
$featuresPageCryptogramList[2]['description'] = '<span class="font-red">CMS</span> RFC 5653';


set_theme_mod('features_page_cryptogram_list', $featuresPageCryptogramList);


$pricingPageIntroPlansList = get_theme_mod('pricing_page_intro_plans_list');

foreach ($pricingPageIntroPlansList as &$item) {
    $itemsString = str_replace("\n\n", "\n", $item['features_list']);

    foreach ($itemsList = explode("\n", $itemsString) as &$it) {
        $it = '-' . $it;
    }

    $item['features_list'] = implode("\n", $itemsList);
}

foreach ($pricingPageIntroPlansList as &$item) {
    $itemsString = str_replace("\n\n", "\n", $item['features_list_disabled']);

    foreach ($itemsList = explode("\n", $itemsString) as &$it) {
        $it = '-' . $it;
    }

    $item['features_list_disabled'] = implode("\n", $itemsList);
}

set_theme_mod('pricing_page_intro_plans_list', $pricingPageIntroPlansList);


