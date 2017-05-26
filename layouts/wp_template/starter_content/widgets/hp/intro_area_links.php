<?php

return [
    'intro_msg_links' => [
        'wp_editor_widget',
        [
            'title'        => 'Intro Msg Links',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'intro_msg_links.html'
            ),
        ],
    ],
];
