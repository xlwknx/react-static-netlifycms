<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <? if (!has_site_icon()): ?>
        <link rel="icon" type="image/png" sizes="32x32" href="<?= get_theme_file_uri('favicons/favicon-32x32.png') ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= get_theme_file_uri('favicons/favicon-16x16.png') ?>">
        <link rel="shortcut icon" href="<?= get_theme_file_uri('favicons/favicon.ico') ?>">
    <? endif; ?>

    <?php wp_head(); ?>
</head>
<body>
