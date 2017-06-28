<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <? if (!has_site_icon()): ?>
        <link rel="icon" type="image/png" href="<?= get_theme_file_uri('favicon.png') ?>">
    <? endif; ?>

    <?php wp_head(); ?>
</head>
<body>
