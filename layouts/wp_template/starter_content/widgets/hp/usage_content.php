<?php

return [
    'usage_msg'      => [
        'wp_editor_widget',
        [
            'title'        => 'Usage Msg',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'usage_msg.html'
            ),
        ],
    ],
    'usage_details'  => [
        'wp_editor_widget',
        [
            'title'        => 'Usage Details',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'usage_details.html'
            ),
        ],
    ],
    'usage_benefits' => [
        'wp_editor_widget',
        [
            'title'        => 'Usage Benefits',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'usage_benefits.html'
            ),
        ],
    ],
];
