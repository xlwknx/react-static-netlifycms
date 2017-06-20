<?php

return [
    'benefits_content'      => [
        'wp_editor_widget',
        [
            'title'        => 'Benefits List',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'benefits_content_list.html'
            ),
        ],
    ]
];
