<?php

return [
    'about-virgil-mission-whatwedo' => [
        'wp_editor_widget',
        [
            'title'        => 'What We Do',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'about_virgil_mission_whatwedo.html'
            ),
        ],
    ],

    'about-virgil-mission-ourmission' => [
        'wp_editor_widget',
        [
            'title'        => 'Our mission',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'about_virgil_mission_ourmission.html'
            ),
        ],
    ],
];

