<?php

return [
    'footer_contacts' => [
        'wp_editor_widget',
        [
            'title'        => 'Footer Contacts',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'footer_contacts.html'
            ),
        ],
    ],
    'footer_nav'      => [
        'wp_editor_widget',
        [
            'title'        => 'Footer Nav',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'footer_nav.html'
            ),
        ],
    ],
];
