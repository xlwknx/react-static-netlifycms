<?php

return [
    [
        'title'                  => 'Starter',
        'is_free'                => true,
        'price'                  => '',
        'duration'               => '',
        'features_list'          => implode(
            "\n\n",
            [
                '<strong>1000</strong> active keys',
                '<strong>1 million</strong> requests/month',
            ]
        ),
        'features_list_disabled' => implode(
            "\n\n",
            ['Geo-balancing', 'Support Available']
        ),
        'link_text'              => 'Choose plan',
        'link_url'               => 'https://developer.virgilsecurity.com/account/signup',
        'link_skin'              => 'raised_red_border_static',
        'is_link_disabled'       => true,
        'is_hidden'              => false,
    ],
    [
        'title'                  => 'Standard',
        'is_free'                => false,
        'price'                  => '50',
        'duration'               => 'year',
        'features_list'          => implode(
            "\n\n",
            [
                "<strong>10,000</strong> active keys",
                "<strong>Unlimited</strong> requests/month",
                "Forum support",
            ]
        ),
        'features_list_disabled' => implode(
            "\n\n",
            ['Geo-balancing']
        ),
        'link_text'              => 'Choose plan',
        'link_url'               => 'https://developer.virgilsecurity.com/account/signup',
        'link_skin'              => 'raised_white_border_static',
        'is_link_disabled'       => true,
        'is_hidden'              => false,
    ],
    [
        'title'                  => 'Business',
        'is_free'                => false,
        'price'                  => '50',
        'duration'               => 'mo',
        'features_list'          => implode(
            "\n\n",
            [
                "<strong>250,000</strong> active keys",
                '<strong>Unlimited</strong> requests/month',
                'Geo-balancing',
                'Email and Forum Support Available',
            ]
        ),
        'features_list_disabled' => '',
        'link_text'              => 'Choose plan',
        'link_url'               => 'https://developer.virgilsecurity.com/account/signup',
        'link_skin'              => 'raised_red_border_static',
        'is_link_disabled'       => true,
        'is_hidden'              => false,
    ],
];
