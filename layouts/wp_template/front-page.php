<? get_template_part('header/front', 'page') ?>

    <div class="container">

    <div class="intro">
        <div class="wrapper">
            <div class="introContentBlock">
                <div class="blockMsg">
                    <div class="kirki_test_controls">
                        <?= get_theme_mod('text_some_tests2'); ?>
                    </div>
                    <div class="kirki_test_controls">
                        <? var_dump(get_theme_mod('my_field_repeater')); ?>
                    </div>
                    <div class="kirki_test_controls">
                        <?= get_theme_mod('text_some_kirki_checkbox'); ?>
                    </div>
                    <div class="kirki_test_controls">
                        <?= get_theme_mod('text_some_kirki_code'); ?>
                    </div>

                    <!--<div class="blog_description">-->
                    <!--    --><?php //bloginfo("description") ?>
                    <!--</div>-->
                    <!--<div class="blog_name">-->
                    <!--    --><?php //bloginfo("name") ?>
                    <!--</div>-->
                    <!---->
                    <!--<div class="blog_custom_date">-->
                    <!--    --><?php //echo get_theme_mod('setting_id') ?>
                    <!--</div>-->

                    <?php //dynamic_sidebar('hp-intro-area-headline'); ?>
                    <h1 class="blockMsg-headline">
                        <?php echo get_theme_mod(
                            'hp_intro_area_headline',
                            'Easy to use security<br>cryptographic building blocks'
                        ) ?>
                    </h1>
                    <div class="blockMsg-links">
                        <?php get_template_part('template-parts/hp/hp_intro_area_links'); ?>
                    </div>
                    <ul class="introLangList">
                        <?php dynamic_sidebar('hp-intro-langs'); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="useCases">
            <div class="wrapper">
                <div class="useCasesContentBlock">
                    <?php dynamic_sidebar('hp-use-case-content'); ?>
                </div>
            </div>
            <div class="useCaseList">
                <?php dynamic_sidebar('hp-use-cases-list'); ?>
            </div>
        </div>
        <div class="services">
            <div class="wrapper">
                <div class="servicesContentBlock">
                    <?php dynamic_sidebar('hp-services-content-block'); ?>
                </div>
            </div>
        </div>
        <div class="clients">
            <div class="wrapper">
                <?php dynamic_sidebar('hp-client-content'); ?>
            </div>
        </div>
        <div class="usage">
            <div class="wrapper">
                <div class="usageContentBlock">
                    <?php dynamic_sidebar('hp-usage-content-block'); ?>
                </div>
            </div>
        </div>
        <div class="benefits">
            <div class="wrapper">
                <div class="benefitsContentBlock">
                    <?php dynamic_sidebar('hp-benefits-content-block'); ?>
                </div>
            </div>
        </div>
        <div class="conclusion">
            <div class="wrapper">
                <div class="conclusionContentBlock">
                    <?php dynamic_sidebar('hp-conclusion-content-block'); ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer();
