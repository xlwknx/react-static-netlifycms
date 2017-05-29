<?php

return [
    'about-virgil-highlights-msg' => [
        'wp_editor_widget',
        [
            'title'        => 'Highlights Msg',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'about_virgil_highlights_msg.html'
            ),
        ],
    ],
];

