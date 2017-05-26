<?php

return [
    'use-case-content' => [
        'wp_editor_widget',
        [
            'title'        => 'Use Case Content',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'use_case_content.html'
            ),
        ],
    ],
];
