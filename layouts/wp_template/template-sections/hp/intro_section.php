<?php
global $links_group;
global $intro_langs_group;
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
                <?php
                $intro_langs_group = virgilsecurity_get_hp_intro_langs();

                foreach ($intro_langs_group as $intro_lang): ?>
                    <li>
                        <a href="<?=$intro_lang['lang_url']?>"><img src="<?=$intro_lang['lang_image']?>" alt=""></a>
                    </li>
                <?endforeach; ?>
            </ul>
        </div>
    </div>
</div>
