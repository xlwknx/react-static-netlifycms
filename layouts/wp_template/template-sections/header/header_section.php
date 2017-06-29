<?php
global $links_group;

$logoImageMod = virgilsecurity_get_header_logo_image();
$authLinksMod = virgilsecurity_get_header_auth_links();
?>

<? if ($logoImageMod->isEnabled()): ?>
    <div class="header-logo">
        <a href="<?= home_url() ?>">
            <img src="<?= $logoImageMod->getValue() ?>" alt="">
        </a>
    </div>

<? endif; ?>

<?= virgilsecurity_get_header_menu() ?>

<? if ($authLinksMod->isEnabled()): ?>

    <div class="headerAuth">
        <?php
        $links_group = $authLinksMod->getValue();
        
        get_template_part('template-sections/_groups/_links_group');
        ?>
    </div>

<? endif; ?>
