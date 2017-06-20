<?php

use VirgilSecurity\Customizer\VirgilSecurityConfig;

use VirgilSecurity\SectionCustomizer;
use VirgilSecurity\SectionModifications;


call_user_func(
    function () {
        global $virgilsecurity_section_mods;

        add_filter('get_theme_starter_content', [$virgilsecurity_section_mods, 'setupDefaults'], 10);

        if (class_exists('Kirki')) {

            $config = VirgilsecurityConfig::create();

            $virgilsecurity_section_customizer = new SectionCustomizer($config, $virgilsecurity_section_mods);

            add_action('customize_register', [$virgilsecurity_section_customizer, 'registerDefaults']);

        } else {
            require_once __DIR__ . '/../kirki-helpers/include-kirki.php';
        }
    }
);
