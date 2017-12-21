<?php

return [
    'about-virgil-intro-msg' => [
        'wp_editor_widget',
        [
            'title'        => 'Intro Msg',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'about_virgil_intro_msg.html'
            ),
        ],
    ],
];

