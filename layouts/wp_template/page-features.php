<?php get_header('features') ?>

<div class="intro">
    <div class="wrapper">
        <div class="introContentBlock">
            <div class="blockMsg">
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
            <div class="blockMsg">
                <?php dynamic_sidebar('features-cryptogram-msg'); ?>
            </div>
            <div class="comparisonBlock cryptogramList">
                <?php dynamic_sidebar('features-cryptogram-list'); ?>
            </div>
        </div>
    </div>
</div>

<div class="components">
    <div class="wrapper">
        <div class="componentsContentBlock layeredBlock">
            <div class="componentsOverview layeredBlockContent">
                <?php dynamic_sidebar('features-components'); ?>
            </div>
        </div>
    </div>
</div>
<div class="languages">
    <div class="wrapper">
        <div class="languagesContentBlock">
            <?php dynamic_sidebar('features-languages'); ?>
        </div>
    </div>
</div>
<div class="faq">
    <div class="wrapper">
        <div class="faqContentBlock">
            <?php dynamic_sidebar('features-faq'); ?>
        </div>
    </div>
</div>

<?php get_footer() ?>
