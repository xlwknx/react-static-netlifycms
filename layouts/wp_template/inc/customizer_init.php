<?php

use VirgilSecurity\Customizer\VirgilSecurityConfig;

use VirgilSecurity\SectionCustomizer;
use VirgilSecurity\SectionModifications;


call_user_func(
    function () {
        global $virgilsecurity_section_mods;

        //$virgilsecurity_section_mods->setupDefaults();

        if (!is_customize_preview()) {
            return;
        }

        if (class_exists('Kirki')) {

            $config = VirgilsecurityConfig::create();

            $virgilsecurity_section_customizer = new SectionCustomizer($config, $virgilsecurity_section_mods);

            add_action('customize_register', [$virgilsecurity_section_customizer, 'registerDefaults']);

            wp_enqueue_style(
                'virgilsecurity-admin-stylesheet',
                get_theme_file_uri('/customizer/css/customization-style.css'),
                '1.0.0'
            );

        } else {
            require_once __DIR__ . '/../kirki-helpers/include-kirki.php';
        }
    }
);
