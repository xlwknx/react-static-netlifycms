<?php

//$this->setField(new TextField('name', __('Name')));
//$this->setField(new ImageField('image', __('Image')));
//$this->setField(new NumberField('width', __('Image width')));
//$this->setField(new NumberField('height', __('Image height')));

$newFrontPageClientsList = [];
$frontPageClientsList = get_theme_mod('hp_clients_list');


$newFrontPageClientsList[0] = $frontPageClientsList[0];
$newFrontPageClientsList[1] = $frontPageClientsList[1];
$newFrontPageClientsList[2] = $frontPageClientsList[3];
$newFrontPageClientsList[3] = [
    'name'      => 'Hushed',
    'image'     => get_template_directory_uri() . '/assets/images/content/home-clients-hushed.png',
    'width'     => '101',
    'height'    => '100',
    'is_hidden' => false,
];

$newFrontPageClientsList[4] = [
    'name'      => 'Cloakroom',
    'image'     => get_template_directory_uri() . '/assets/images/content/home-clients-cloakroom.png',
    'width'     => '62',
    'height'    => '100',
    'is_hidden' => false,
];

$newFrontPageClientsList[5] = [
    'name'      => 'Appfriends',
    'image'     => get_template_directory_uri() . '/assets/images/content/home-clients-appfriends.png',
    'width'     => '131',
    'height'    => '100',
    'is_hidden' => false,
];

$newFrontPageClientsList[6] = $frontPageClientsList[4];


set_theme_mod('hp_clients_list', $newFrontPageClientsList);

