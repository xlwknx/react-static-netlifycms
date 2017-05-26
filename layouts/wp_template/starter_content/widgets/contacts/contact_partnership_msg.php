<?php

return [
    'contact_partnership_msg' => [
        'wp_editor_widget',
        [
            'title'        => 'Contact Partnership Msg',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'contact_partnership_msg.html'
            ),
        ],
    ],
];

