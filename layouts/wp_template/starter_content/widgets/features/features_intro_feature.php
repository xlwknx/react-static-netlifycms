<?php

return [
    'features_intro_feature' => [
        'wp_editor_widget',
        [
            'title'        => 'Features Intro List',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'features_intro_feature.html'
            ),
        ],
    ],
];
