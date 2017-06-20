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
        <button class="headerCloseButton" data-vs-sideNav-close>
            <i class="icon icon-close"></i>
        </button>
        <nav class="headerNav">
            <ul class="firstLevel-list">
                <li class="firstLevel-item">
                    <div class="firstLevel-itemLink">Get started</div>
                    <ul class="secondLevel-list">
                        <li class="secondLevel-item">
                            <a href="" class="secondLevel-itemLink">Encrypted communication</a>
                        </li>
                        <li class="secondLevel-item">
                            <a href="" class="secondLevel-itemLink">Encrypted storage</a>
                        </li>
                        <li class="secondLevel-item">
                            <a href="" class="secondLevel-itemLink">Passwordless Authentication</a>
                        </li>
                        <li class="secondLevel-item">
                            <a href="" class="secondLevel-itemLink">Data Integrity</a>
                        </li>
                    </ul>
                </li>
                <li class="firstLevel-item">
                    <div class="firstLevel-itemLink">Developers</div>
                    <ul class="secondLevel-list">
                        <li class="secondLevel-item">
                            <a href="" class="secondLevel-itemLink">Documentation</a>
                        </li>
                        <li class="secondLevel-item">
                            <a href="" class="secondLevel-itemLink">API references</a>
                        </li>
                    </ul>
                </li>
                <li class="firstLevel-item">
                    <div class="firstLevel-itemLink">Company</div>
                    <ul class="secondLevel-list">
                        <li class="secondLevel-item">
                            <a href="" class="secondLevel-itemLink headerNav-about">About Virgil</a>
                        </li>
                        <li class="secondLevel-item">
                            <a href="" class="secondLevel-itemLink headerNav-clients">Clients</a>
                        </li>
                        <li class="secondLevel-item">
                            <a href="" class="secondLevel-itemLink">Blog</a>
                        </li>
                    </ul>
                </li>
                <li class="firstLevel-item">
                    <a class="firstLevel-itemLink">Features</a>
                </li>
                <li class="firstLevel-item">
                    <a class="firstLevel-itemLink">Pricing</a>
                </li>
                <li class="firstLevel-item">
                    <a class="firstLevel-itemLink">Contacts</a>
                </li>
            </ul>
        </nav>
        <div class="headerAuth">
            <a href="" class="headerAuth-link"><span>Login / Sign In</span></a>
        </div>
    </div>
</header>
