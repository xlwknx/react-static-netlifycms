<? get_template_part('header/about', 'virgil') ?>

<div class="container">
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
            <div class="highlightsContentBlock layeredBlock layeredBlock--left">
                <div id="aboutHighlightsCarousel" class="highlightsCarousel layeredBlockContent carousel slide" data-ride="carousel" data-pause="hover">
                    <div class="blockMsg">
                        <?php dynamic_sidebar('about-virgil-highlights-msg'); ?>
                        <ul class="highlightsCarousel-controls carousel-indicators">
                            <li class="highlightsCarousel-control active" data-target="#aboutHighlightsCarousel" data-slide-to="0"></li>
                            <li class="highlightsCarousel-control" data-target="#aboutHighlightsCarousel" data-slide-to="1"></li>
                        </ul>
                    </div>
                    <div class="highlightsOverview">
                        <a href="#aboutHighlightsCarousel" class="highlightsCarousel-previous" data-slide="prev"></a>
                        <ul class="highlightList carousel-inner">
                            <?php dynamic_sidebar('about-virgil-highlights-items'); ?>
                        </ul>
                        <a href="#aboutHighlightsCarousel" class="highlightsCarousel-next" data-slide="next"></a>
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
</div>

<?php get_footer() ?>
