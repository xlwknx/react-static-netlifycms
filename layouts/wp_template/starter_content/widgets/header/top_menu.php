<?php

return [
    'top-menu-center' => [
        'wp_editor_widget',
        [
            'title'        => 'Top Menu',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'top_menu.html'
            ),
        ],
    ],
    'top-menu-auth' => [
        'wp_editor_widget',
        [
            'title'        => 'Header Auth',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'header_auth.html'
            ),
        ],
    ],
];
