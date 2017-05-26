<?php

return [
    'conclusion_msg' => [
        'wp_editor_widget',
        [
            'title'        => 'Conclusion Msg',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'pricing_conclusion_msg.html'
            ),
        ],
    ],
];

