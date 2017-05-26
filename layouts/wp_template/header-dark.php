<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="<?= get_global_block_class() ?>">
    <header class="header header--dark">
        <div class="header-logo">
            <a href="<?= home_url() ?>">
                <img src="<?php echo get_theme_file_uri('assets/logo-red.png') ?>" alt="">
            </a>
        </div>
        <?php dynamic_sidebar('top-menu') ?>
    </header>
