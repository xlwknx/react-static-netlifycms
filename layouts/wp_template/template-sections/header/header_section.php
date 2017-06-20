<div class="header-logo">
    <a href="<?= home_url() ?>">
        <img src="<?= virgilsecurity_get_header_logo_image() ?>" alt="">
    </a>
</div>
<?= virgilsecurity_get_header_menu() ?>
<div class="headerAuth">
    <? foreach (virgilsecurity_get_header_auth_links() as $auth_link): ?>
        <a href="<?= $auth_link['link_url'] ?>"
           class="<?= $auth_link['link_class'] ?>"><?= $auth_link['link_text'] ?></a>
    <? endforeach; ?>
</div>
