<?php

return [
    'includes_msg' => [
        'wp_editor_widget',
        [
            'title'        => 'Includes Msg',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'pricing_includes_msg.html'
            ),
        ],
    ],
];
