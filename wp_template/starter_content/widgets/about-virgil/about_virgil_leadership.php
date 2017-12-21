<?php

return [
    'about-virgil-leadership-caption' => [
        'wp_editor_widget',
        [
            'title'        => 'Caption Text',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'about_virgil_leadership_caption.html'
            ),
        ],
    ],

    'about-virgil-leadership-profiles' => [
        'wp_editor_widget',
        [
            'title'        => 'Profiles',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'about_virgil_leadership_profiles.html'
            ),
        ],
    ],
];

