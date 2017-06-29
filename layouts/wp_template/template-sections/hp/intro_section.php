<?php
global $links_group;

$intro_links = virgilsecurity_get_hp_intro_links();
$msgTextMod = virgilsecurity_get_hp_intro_msg_text();
$intro_langs = virgilsecurity_get_hp_intro_langs();
?>

<div class="wrapper">
    <div class="introContentBlock">
        <div class="blockMsg">
            <? if ($msgTextMod->isEnabled()) : ?>
                <h1 class="blockMsg-headline">
                    <?= $msgTextMod->getValue() ?>
                </h1>
            <? endif; ?>
            <? if ($intro_links->isEnabled()) : ?>
                <div class="blockMsg-links">
                    <?php
                    $links_group = $intro_links->getValue();

                    get_template_part('template-sections/_groups/_links_group');
                    ?>
                </div>
            <? endif; ?>
        </div>
        <? if ($intro_langs->isEnabled()): ?>
            <ul class="introLangList">
                <?php
                foreach ($intro_langs->getValue() as $intro_lang): ?>
                    <? if (!$intro_lang['is_hidden']) : ?>
                        <li>
                            <a href="<?= $intro_lang['lang_url'] ?>"><img src="<?= $intro_lang['lang_image'] ?>" alt=""></a>
                        </li>
                    <? endif; ?>
                <? endforeach; ?>
            </ul>
        <? endif; ?>
    </div>
</div>
