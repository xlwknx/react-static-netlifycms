<?php

return [
    'intro_msg_headline' => [
        'wp_editor_widget',
        [
            'title' => 'Heading',
            'output_title'   => false,
            'content'   => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'intro_msg_headline.html'
            ),
        ],
    ],
];


//return [
//    'intro_msg_headline' => [
//        'black-studio-tinymce',
//        [
//            'type'   => 'visual',
//            'filter' => false,
//            'text'   => file_get_contents(
//                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'intro_msg_headline.html'
//            ),
//        ],
//    ],
//];
