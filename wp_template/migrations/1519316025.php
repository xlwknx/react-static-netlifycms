<?php

$hpIntroAnnounceMsg = get_theme_mod('hp_intro_announce_msg');
$hpIntroAnnounceLink = get_theme_mod('hp_intro_announce_link');

$hpIntroAnnouncements = [];

$hpIntroAnnouncements = [
    [
        "text"      => $hpIntroAnnounceMsg,
        "url"       => $hpIntroAnnounceLink,
        "is_hidden" => true,
    ],
    [
        "text"      => "end-to-end encrypted chat",
        "url"       => "https://virgilsecurity.com/end-to-end-encrypted-chat/",
        "is_hidden" => false,
    ],
    [
        "text"      => "end-to-end iot security",
        "url"       => "https://virgilsecurity.com/iot/",
        "is_hidden" => false,
    ],
];


set_theme_mod('hp_intro_announcements', $hpIntroAnnouncements);
