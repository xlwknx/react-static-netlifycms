<?php

return [
    'plans_list' => [
        'wp_editor_widget',
        [
            'title'        => 'Pricing List',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'pricing_plans_list.html'
            ),
        ],
    ],
];
