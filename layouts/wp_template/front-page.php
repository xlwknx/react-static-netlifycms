<?php get_header(); ?>

    <div class="intro">
        <div class="wrapper">
            <div class="introContentBlock">
                <div class="introMsg">
                    <?php dynamic_sidebar('hp-intro-area-headline'); ?>
                    <div class="introMsg-links">
                        <?php dynamic_sidebar('hp-intro-area-links'); ?>
                    </div>
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
    <div class="clients">
        <div class="wrapper">
            <?php dynamic_sidebar('hp-client-content'); ?>
        </div>
    </div>
    <div class="services">
        <div class="wrapper">
            <div class="servicesContentBlock">
                <?php dynamic_sidebar('hp-services-content-block'); ?>
            </div>
        </div>
    </div>
    <div class="usage">
        <div class="wrapper">
            <div class="usageContentBlock">
                <?php dynamic_sidebar('hp-usage-content-block'); ?>
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

<?php get_footer();
