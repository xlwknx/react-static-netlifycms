<? get_template_part('header/front', 'page') ?>

    <div class="container">

        <?php get_template_part('template-sections/hp/intro_section'); ?>
        
        <div class="wrapper">
            <div class="useCasesContentBlock">
                <?php dynamic_sidebar('hp-use-case-content'); ?>
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
