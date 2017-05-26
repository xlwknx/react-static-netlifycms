<?php

return [
    'enterprise_offer_list' => [
        'wp_editor_widget',
        [
            'title'        => 'Enterprise Offer List',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'pricing_enterprise_offer_list.html'
            ),
        ],
    ],
];
