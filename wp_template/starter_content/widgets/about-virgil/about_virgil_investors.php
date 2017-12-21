<?php

return [
    'about_virgil_investors_caption' => [
        'wp_editor_widget',
        [
            'title'        => 'Investors Image',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'about_virgil_investors_caption.html'
            ),
        ],
    ],

    'about_virgil_investors_list' => [
        'wp_editor_widget',
        [
            'title'        => 'Investors List',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'about_virgil_investors_list.html'
            ),
        ],
    ],
];

