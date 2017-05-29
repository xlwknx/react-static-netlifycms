<?php

return [
    'features_languages' => [
        'wp_editor_widget',
        [
            'title'        => 'Features Languages',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'features_languages.html'
            ),
        ],
    ],
];
