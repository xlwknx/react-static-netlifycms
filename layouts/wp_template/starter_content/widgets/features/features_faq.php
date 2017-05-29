<?php

return [
    'features_faq_caption' => [
        'wp_editor_widget',
        [
            'title'        => 'FAQ caption',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'features_faq_caption.html'
            ),
        ],
    ],
    'features_faq_list'    => [
        'wp_editor_widget',
        [
            'title'        => 'FAQ list',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'features_faq_list.html'
            ),
        ],
    ],
    'features_faq_content' => [
        'wp_editor_widget',
        [
            'title'        => 'FAQ content',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'features_faq_content.html'
            ),
        ],
    ],
];
