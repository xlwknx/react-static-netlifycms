<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="<?= get_post_type() ?> <?= get_static_page_class() ?>">
