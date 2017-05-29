<?php

return [
    'features_components_msg'   => [
        'wp_editor_widget',
        [
            'title'        => 'Components Msg',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'features_components_msg.html'
            ),
        ],
    ],
    'features_components_list'  => [
        'wp_editor_widget',
        [
            'title'        => 'Components List',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'features_components_list.html'
            ),
        ],
    ],
    'features_components_links' => [
        'wp_editor_widget',
        [
            'title'        => 'Components Links',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'features_components_links.html'
            ),
        ],
    ],
];
