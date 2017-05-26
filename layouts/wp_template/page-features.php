<?php get_header() ?>

<div class="intro">
    <div class="wrapper">
        <div class="introContentBlock">
            <div class="introMsg">
                <?php dynamic_sidebar('features-intro-msg'); ?>
            </div>
            <ul class="introFeatures">
                <?php dynamic_sidebar('features-intro-feature'); ?>
            </ul>
        </div>
    </div>
</div>
<div class="cryptogram">
    <div class="wrapper">
        <div class="cryptogramContentBlock">
            <div class="cryptogramMsg">
                <?php dynamic_sidebar('features-cryptogram-msg'); ?>
            </div>
            <div class="comparisonBlock cryptogramList">
                <?php dynamic_sidebar('features-cryptogram-list'); ?>
            </div>
        </div>
    </div>
</div>
<div class="components"></div>
<div class="languages"></div>
<div class="faq"></div>

<?php get_footer() ?>
