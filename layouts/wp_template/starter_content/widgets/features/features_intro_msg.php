<?php

return [
    'features_intro_msg' => [
        'wp_editor_widget',
        [
            'title'        => 'Features Intro Msg',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'features_intro_msg.html'
            ),
        ],
    ],
];
