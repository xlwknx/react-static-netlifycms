<?php

use VirgilSecurity\Customizer\VirgilSecurityConfig;

use VirgilSecurity\SectionCustomizer;
use VirgilSecurity\SectionModifications;


call_user_func(
    function () {

        $section_mods = SectionModifications::getInstance();
        //$section_mods->setupDefaults();

        if (!is_customize_preview()) {
            return;
        }

        if (class_exists('Kirki')) {

            $config = VirgilsecurityConfig::getInstance();

            $section_customizer = new SectionCustomizer($config, $section_mods);

            add_action('customize_register', [$section_customizer, 'registerDefaults']);

        } else {
            require_once __DIR__ . '/../kirki-helpers/include-kirki.php';
        }
    }
);
