<?php

function viriglsecurity_customize_preview()
{
    wp_enqueue_script(
        'viriglsecurity-customize-preview',
        get_theme_file_uri('/customizer/js/customize-preview.js'),
        ['customize-preview'],
        '1.0',
        true
    );

    wp_enqueue_style(
        'virgilsecurity-admin-stylesheet',
        get_theme_file_uri('/customizer/css/customization-style.css'),
        '1.0.0'
    );
}

add_action('customize_preview_init', 'viriglsecurity_customize_preview');
