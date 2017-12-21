<?php

$updateImagePath = function ($modName) {
    /** @var array $mod */
    $mod = get_theme_mod($modName);

    if (is_array($mod)) {
        foreach ($mod as &$item) {
            if (isset($item['image'])) {
                $item['image'] = str_replace("assets", "assets/images/content", $item['image']);
            }
        }
    } else {
        $mod = str_replace("assets", "assets/images/content", $mod);
    }

    set_theme_mod($modName, $mod);
};

///** @var array $hpIntroLangs */
//$hpIntroLangs = get_theme_mod("hp_intro_langs");
//
//foreach ($hpIntroLangs as &$lang) {
//    $lang['image'] = $lang['lang_image'];
//    unset($lang['lang_image']);
//}
//
//set_theme_mod("hp_intro_langs", $hpIntroLangs);

$updateImagePath("hp_usage_slide_list");
$updateImagePath("hp_services_list");
//$updateImagePath("hp_intro_langs");
$updateImagePath("hp_clients_list");
$updateImagePath("hp_benefits_list");
$updateImagePath("header_logo_image");
$updateImagePath("footer_logo_image");
$updateImagePath("features_page_intro_list");
$updateImagePath("features_page_features_list");
$updateImagePath("features_page_cryptogram_list");
$updateImagePath("features_page_components_list");
$updateImagePath("pricing_page_includes_list");
$updateImagePath("pricing_page_enterprise_image");

remove_theme_mod("hp_intro_langs");

$hpServiceList = get_theme_mod("hp_services_list");

$hpServiceList = [
    [
        'text'       => __('Encrypted communication'),
        'url'        => 'https://developer.virgilsecurity.com/docs/get-started/encrypted-communication',
        'hover_text' => __('Learn more'),
        'image'      => get_template_directory_uri() . '/assets/images/content/home-shared-services-conversation.svg',
        'width'      => 101,
        'height'     => 75,
        'is_hidden'  => false,
    ],
    [
        'text'       => __('Passwordless authentication'),
        'url'        => 'https://developer.virgilsecurity.com/docs/get-started/passwordless-authentication',
        'hover_text' => __('Learn more'),
        'image'      => get_template_directory_uri() . '/assets/images/content/home-shared-services-user.svg',
        'width'      => 101,
        'height'     => 75,
        'is_hidden'  => false,
    ],
    [
        'text'       => __('Encrypted storage'),
        'url'        => 'https://developer.virgilsecurity.com/docs/get-started/encrypted-storage',
        'hover_text' => __('Learn more'),
        'image'      => get_template_directory_uri() . '/assets/images/content/home-shared-services-box.svg',
        'width'      => 101,
        'height'     => 75,
        'is_hidden'  => false,
    ],
    [
        'text'       => __('Data integrity'),
        'url'        => 'https://developer.virgilsecurity.com/docs/get-started/data-integrity',
        'hover_text' => __('Learn more'),
        'image'      => get_template_directory_uri() . '/assets/images/content/home-shared-services-cloud.svg',
        'width'      => 101,
        'height'     => 75,
        'is_hidden'  => false,
    ],
    [
        'text'       => __('Perfect forward secrecy'),
        'url'        => 'https://developer.virgilsecurity.com/docs/get-started/perfect-forward-secrecy',
        'hover_text' => __('Learn more'),
        'image'      => get_template_directory_uri() . '/assets/images/content/home-shared-services-lock.svg',
        'height'     => 99,
        'width'      => 101,
        'is_hidden'  => false,
    ],
];

set_theme_mod("hp_services_list", $hpServiceList);

$introServicesList = [
    [
        'label'            => 'Conversation',
        'tooltip_headline' => 'Encrypted communication',
        'tooltip_text'     => 'Live in safety! Use encryption to communicate securely with two or more participants.',
        'image'            => get_template_directory_uri() .
                              '/assets/images/content/home-shared-services-conversation.svg',
        'url'              => 'https://developer.virgilsecurity.com/docs/get-started/encrypted-communication',
        'width'            => 50,
        'height'           => 45,
        'is_hidden'        => false,
    ],
    [
        'label'            => 'Lock',
        'tooltip_headline' => 'Perfect forward secrecy',
        'tooltip_text'     => 'Virgil Perfect Forward Secrecy (PFS) is designed to prevent a possibly compromised long-term secret key from affecting the confidentiality of past communications.',
        'image'            => get_template_directory_uri() . '/assets/images/content/home-shared-services-lock.svg',
        'url'              => 'https://developer.virgilsecurity.com/docs/get-started/perfect-forward-secrecy',
        'width'            => 60,
        'height'           => 60,
        'is_hidden'        => false,
    ],
    [
        'label'            => 'User',
        'tooltip_headline' => 'Passwordless authentication',
        'tooltip_text'     => 'Use Virgil Auth to let a user log into your application without a password.',
        'image'            => get_template_directory_uri() . '/assets/images/content/home-shared-services-user.svg',
        'url'              => 'https://developer.virgilsecurity.com/docs/get-started/passwordless-authentication',
        'width'            => 50,
        'height'           => 48,
        'is_hidden'        => false,
    ],
    [
        'label'            => 'Box',
        'tooltip_headline' => 'Encrypted storage',
        'tooltip_text'     => 'It is very easy to encrypt data for secure storage in the Cloud and requires only a few steps.',
        'image'            => get_template_directory_uri() . '/assets/images/content/home-shared-services-box.svg',
        'url'              => 'https://developer.virgilsecurity.com/docs/get-started/encrypted-storage',
        'width'            => 45,
        'height'           => 44,
        'is_hidden'        => false,
    ],
    [
        'label'            => 'Cloud',
        'tooltip_headline' => 'Data integrity',
        'tooltip_text'     => 'Use Virgil to verify the integrity of data at any point.',
        'image'            => get_template_directory_uri() . '/assets/images/content/home-shared-services-cloud.svg',
        'url'              => 'https://developer.virgilsecurity.com/docs/get-started/data-integrity',
        'width'            => 55,
        'height'           => 38,
        'is_hidden'        => false,
    ],
];

set_theme_mod("hp_intro_services", $introServicesList);
set_theme_mod("hp_intro_services_headline", "Or choose use case and start now:");

