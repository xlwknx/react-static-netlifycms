<?php


return [
    [
        'image' => get_template_directory_uri() . '/assets/features-cryptogram-ecies.png',
        'items' => implode(",\n", ['sender’s ephemeral public key', 'tag', 'encrypted content']),
        'skin'  => 'regular',
    ],
    [
        'image' => get_template_directory_uri() . '/assets/features-cryptogram-vs.png',
        'items' => implode(",\n", ['algorithms identifiers', 'sender’s ephemeral public key', 'tag', 'encrypted content', 'user’s encrypted data']),
        'skin'  => 'highlighted',
    ],
    [
        'image' => get_template_directory_uri() . '/assets/features-cryptogram-cms.png',
        'items' => implode(",\n", ['algorithms identifiers', 'sender’s ephemeral public key', 'tag', 'encrypted content']),
        'skin'  => 'regular',
    ],
];
