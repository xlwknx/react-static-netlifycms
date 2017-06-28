<? get_template_part('header/features') ?>

<div class="container">
    <div class="intro cryptogram">
        <div class="wrapper">
            <div class="introContentBlock">
                <div class="blockMsg">
                    <?php dynamic_sidebar('features-intro-msg'); ?>
                </div>
                <ul class="introFeatures">
                    <?php dynamic_sidebar('features-intro-feature'); ?>
                </ul>
            </div>
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
            <div class="componentsContentBlock layeredBlock layeredBlock--right">
                <div class="componentsOverview layeredBlockContent">
                    <?php dynamic_sidebar('features-components'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="features">
        <div class="wrapper">
            <div class="featuresContentBlock">
                <ul class="featureList">
                    <?php dynamic_sidebar('features-languages'); ?>
                </ul>
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
</div>

<?php get_footer() ?>
