<?php

return [
    'services_content_caption' => [
        'wp_editor_widget',
        [
            'title'        => 'Services Content Caption',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'services_content_caption.html'
            ),
        ],
    ],

    'services_content_msg' => [
        'wp_editor_widget',
        [
            'title'        => 'Services Content Msg',
            'output_title' => false,
            'content'         => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'services_content_msg.html'
            ),
        ],
    ],

    'services_content_list' => [
        'wp_editor_widget',
        [
            'title'        => 'Services Content List',
            'output_title' => false,
            'content'         => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'services_content_list.html'
            ),
        ],
    ],
];
