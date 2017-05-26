<?php

return [
    'use-cases-list' => [
        'wp_editor_widget',
        [
            'title'        => 'Use Case List',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'use_cases_list.html'
            ),
        ],
    ],
];
