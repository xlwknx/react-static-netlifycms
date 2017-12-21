<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <?php if (!has_site_icon()): ?>
        <link rel="icon" type="image/png" sizes="32x32"
              href="<?= get_template_directory_uri() ?>/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16"
              href="<?= get_template_directory_uri() ?>/favicons/favicon-16x16.png">
        <link rel="shortcut icon" href="<?= get_template_directory_uri() ?>/favicons/favicon.ico">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<body>
