<?php

return [
    'top-menu-mobile'      => [
        'wp_editor_widget',
        [
            'title'        => 'Mobile Top Menu',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'mobile' . DIRECTORY_SEPARATOR .
                'top_menu.html'
            ),
        ],
    ],
    'top-menu-auth-mobile' => [
        'wp_editor_widget',
        [
            'title'        => 'Mobile Header Auth',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'mobile' . DIRECTORY_SEPARATOR .
                'header_auth.html'
            ),
        ],
    ],
];
