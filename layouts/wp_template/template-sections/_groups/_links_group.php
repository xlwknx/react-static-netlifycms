<?
global $links_group;
global $auth_link;

foreach ($links_group as $auth_link): ?>
    <?
    if (array_key_exists('is_hidden', $auth_link) && $auth_link['is_hidden'] == false) {
        get_template_part('template-sections/_groups/_link_button_skin/' . $auth_link['link_button_skin']);
    }
    ?>
<? endforeach;
