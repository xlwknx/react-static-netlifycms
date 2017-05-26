<?php

return [
    'contact_map_address' => [
        'wp_editor_widget',
        [
            'title'        => 'Contact Map Address',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'contact_map_address.html'
            ),
        ],
    ],
];

