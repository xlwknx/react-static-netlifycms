<?php
global $virgilSecurityHeaderThemeClass;
?>
<header class="header">
    <div class="headerFull <?= $virgilSecurityHeaderThemeClass ?> " data-vs-sticky-header>
        <div class="headerLogo">
            <a href="<?= home_url() ?>"><img src="<?= get_theme_file_uri('assets/logo-red.svg') ?>" width="145" height="47" alt=""></a>
        </div>

        <?php dynamic_sidebar('top-menu') ?>

        <button data-vs-sideNav-open class="headerOpenButton">
            <i class="icon icon-menu-red"></i>
        </button>
    </div>
    <div class="headerSideBar" data-vs-sideNav-target>
        <div class="headerCloseButton">
            <button data-vs-sideNav-close>
                <i class="icon icon-close-red"></i>
            </button>
        </div>
        <?php dynamic_sidebar('mobile-top-menu') ?>
    </div>
</header>
