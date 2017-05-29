<?php

return [
    'about_virgil_awards_caption' => [
        'wp_editor_widget',
        [
            'title'        => 'Awards Caption',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'about_virgil_awards_caption.html'
            ),
        ],
    ],

    'about_virgil_awards_image' => [
        'wp_editor_widget',
        [
            'title'        => 'Awards Image',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'about_virgil_awards_image.html'
            ),
        ],
    ],
];

