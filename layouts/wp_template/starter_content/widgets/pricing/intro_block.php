<?php

return [
    'intro_block' => [
        'wp_editor_widget',
        [
            'title'        => 'Intro Block',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'pricing_intro.html'
            ),
        ],
    ],
];
