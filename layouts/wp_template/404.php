<? get_template_part('header/page-404') ?>

<div class="container">
    <div class="intro">
        <div class="wrapper">
            <div class="introContentBlock">
                <h1 class="intro-caption">404</h1>
                <div class="blockMsg">
                    <h2 class="blockMsg-headline">Page not found</h2>
                    <p class="blockMsg-text">The Page you are looking for doesn’t exist or an other occurred. <br> Go
                        back, or head over to main page to choose a new directions</p>
                    <div class="blockMsg-links">
                        <a href="/" class="button-raisedRed">Main page</a>
                        <a href="<?= wp_get_referer()? wp_get_referer() : '/' ; ?>" class="button-flat">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>
