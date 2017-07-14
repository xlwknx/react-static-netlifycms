<?
global $links_group;
global $auth_link;

foreach ($links_group as $auth_link): ?>
    <?
    get_template_part('template-sections/_groups/_link_button_skin/' . $auth_link['link_button_skin']);
    ?>
<? endforeach;
