<?php

return [
    'enterprise_offer_links' => [
        'wp_editor_widget',
        [
            'title'        => 'Enterprise Offer Links',
            'output_title' => false,
            'content'      => file_get_contents(
                __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'pricing_enterprise_offer_links.html'
            ),
        ],
    ],
];
