<?php
global $links_group;
?>
<div class="header-logo">
    <a href="<?= home_url() ?>">
        <img src="<?= virgilsecurity_get_header_logo_image() ?>" alt="">
    </a>
</div>
<?= virgilsecurity_get_header_menu() ?>
<div class="headerAuth">
    <?php
    $links_group = virgilsecurity_get_header_auth_links();
    get_template_part('template-sections/_groups/_links_group');
    ?>
</div>
