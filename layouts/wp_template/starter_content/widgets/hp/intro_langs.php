<?php

return [
    'intro_langs' => [
        'wp_editor_widget',
        [
            'title'        => 'Intro Lang List',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'intro_langs.html'
            ),
        ],
    ],
];
