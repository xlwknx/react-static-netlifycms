<? get_template_part('header/about', 'virgil') ?>

<div class="intro">
    <div class="wrapper">
        <div class="introContentBlock">
            <div class="blockMsg">
                <?php dynamic_sidebar('about-virgil-intro-msg'); ?>
            </div>
            <ul class="introDataList">
                <?php dynamic_sidebar('about-virgil-intro-list'); ?>
            </ul>
        </div>
    </div>
</div>
<div class="mission">
    <div class="wrapper">
        <div class="missionContentBlock">
            <?php dynamic_sidebar('about-virgil-mission'); ?>
        </div>
    </div>
</div>
<div class="leadership">
    <div class="wrapper">
        <div class="leadershipContentBlock">
            <?php dynamic_sidebar('about-virgil-leadership'); ?>
        </div>
    </div>
</div>
<div class="highlights">
    <div class="wrapper">
        <div class="highlightsContentBlock layeredBlock">
            <div class="layeredBlockContent">
                <div class="blockMsg">
                    <?php dynamic_sidebar('about-virgil-highlights-msg'); ?>
                </div>
                <div class="highlightsCarousel-controls">
                    <div class="highlightsCarousel-control"></div>
                    <div class="highlightsCarousel-control"></div>
                    <div class="highlightsCarousel-control"></div>
                </div>
                <div class="highlightsCarousel">
                    <div class="highlightsCarousel-previous"></div>
                    <div class="highlightsList">
                        <?php dynamic_sidebar('about-virgil-highlights-items'); ?>
                    </div>
                    <div class="highlightsCarousel-next"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="awards">
    <div class="wrapper">
        <div class="awardsContentBlock">
            <?php dynamic_sidebar('about-virgil-awards'); ?>
        </div>
    </div>
</div>
<div class="investors">
    <div class="wrapper">
        <div class="investorsContentBlock">
            <?php dynamic_sidebar('about-virgil-investors'); ?>
        </div>
    </div>
</div>

<?php get_footer() ?>
