<?php

use VirgilSecurity\Customizer\VirgilSecurityConfig;

use VirgilSecurity\SectionCustomizer;
use VirgilSecurity\SectionModifications;


call_user_func(
    function () {

        $sectionModifications = new SectionModifications();

        add_filter('get_theme_starter_content', [$sectionModifications, 'setupDefaults'], 10);

        if (class_exists('Kirki')) {

            $config = VirgilsecurityConfig::create();

            $sectionCustomizer = new SectionCustomizer($config, $sectionModifications);

            add_action('customize_register', [$sectionCustomizer, 'registerDefaults']);

        } else {
            require_once __DIR__ . '/../kirki-helpers/include-kirki.php';
        }
    }
);
