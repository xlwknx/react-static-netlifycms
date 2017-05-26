<?php

return [
    'contact_us_block_form' => [
        'wp_editor_widget',
        [
            'title'        => 'Contact Us Block Form',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'contact_us_block_form.html'
            ),
        ],
    ],
    'contact_us_block_info' => [
        'wp_editor_widget',
        [
            'title'        => 'Contact Us Block Info',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'contact_us_block_info.html'
            ),
        ],
    ],
];

