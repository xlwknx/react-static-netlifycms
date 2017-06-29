<?php require_once '_header.php' ?>
<? if (get_theme_mod('is_enabled_header_section') == "1") : ?>
    <header class="header">
        <?php get_template_part('template-sections/header/header_section'); ?>
    </header>
<?endif;
