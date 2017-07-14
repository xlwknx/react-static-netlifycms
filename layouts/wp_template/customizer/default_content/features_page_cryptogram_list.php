<?php


return [
    [
        'image'     => get_template_directory_uri() . '/assets/features-cryptogram-ecies.png',
        'items'     => implode("\n\n", ['sender’s ephemeral public key', 'tag', 'encrypted content']),
        'is_hidden' => false,
    ],
    [
        'image'     => get_template_directory_uri() . '/assets/features-cryptogram-vs.png',
        'items'     => implode(
            "\n\n",
            [
                'algorithms identifiers',
                'sender’s ephemeral public key',
                'tag',
                'encrypted content',
                'user’s encrypted data',
            ]
        ),
        'is_hidden' => false,
    ],
    [
        'image'     => get_template_directory_uri() . '/assets/features-cryptogram-cms.png',
        'items'     => implode(
            "\n\n",
            ['algorithms identifiers', 'sender’s ephemeral public key', 'tag', 'encrypted content']
        ),
        'is_hidden' => false,
    ],
];
