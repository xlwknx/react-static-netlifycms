<?php

return [
    'includes_list' => [
        'wp_editor_widget',
        [
            'title'        => 'Includes List',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'pricing_includes_list.html'
            ),
        ],
    ],
];
