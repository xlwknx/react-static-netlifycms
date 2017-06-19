<?php
global $links_group;
?>
<div class="intro">
    <div class="wrapper">
        <div class="introContentBlock">
            <div class="blockMsg">
                <h1 class="blockMsg-headline">
                    <?= virgilsecurity_get_hp_intro_msg_text() ?>
                </h1>
                <div class="blockMsg-links">
                    <?php
                    $links_group = virgilsecurity_get_hp_intro_links();
                    get_template_part('template-sections/_groups/_links_group');
                    ?>
                </div>
            </div>
            <ul class="introLangList">
                <?php dynamic_sidebar('hp-intro-langs'); ?>
            </ul>
        </div>
    </div>
</div>
