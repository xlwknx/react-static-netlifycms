<?php

return [
    'contact_us_msg' => [
        'wp_editor_widget',
        [
            'title'        => 'Contact Us Msg',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'contact_us_msg.html'
            ),
        ],
    ],
];

