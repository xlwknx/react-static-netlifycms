<?php

return [
    'footer_copyright' => [
        'wp_editor_widget',
        [
            'title'        => 'Footer Copyright',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'footer_copyright.html'
            ),
        ],
    ],
    'footer_policy'    => [
        'wp_editor_widget',
        [
            'title'        => 'Footer Policy',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'footer_policy.html'
            ),
        ],
    ],
];
