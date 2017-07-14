<?php

function viriglsecurity_customize_preview_js()
{
    wp_enqueue_script(
        'viriglsecurity-customize-preview',
        get_theme_file_uri('/customizer/js/customize-preview.js'),
        ['customize-preview'],
        '1.0',
        true
    );
}

add_action('customize_preview_init', 'viriglsecurity_customize_preview_js');
