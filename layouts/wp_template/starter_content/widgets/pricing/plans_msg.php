<?php

return [
    'plans_msg' => [
        'wp_editor_widget',
        [
            'title'        => 'Pricing Plans Msg',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'pricing_plans.html'
            ),
        ],
    ],
];
