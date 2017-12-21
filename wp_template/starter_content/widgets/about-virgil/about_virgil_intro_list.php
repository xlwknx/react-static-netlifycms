<?php

return [
    'about-virgil-intro-list' => [
        'wp_editor_widget',
        [
            'title'        => 'Intro List',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'about_virgil_intro_list.html'
            ),
        ],
    ],
];

