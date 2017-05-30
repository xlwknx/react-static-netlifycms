<?php get_header() ?>

<?php while (have_posts() && is_singular('page')) : the_post(); ?>
    <?php $postContentMenuItems = get_post_meta(get_the_ID(), 'content_menu_item'); ?>

    <div class="intro">
        <div class="wrapper">
            <div class="introContentBlock">
                <div class="blockMsg">
                    <h1 class="blockMsg-headline"><?php the_title(); ?></h1>
                </div>

                <ul class="introNav">
                    <? foreach ($postContentMenuItems as $link): ?>
                        <li>
                            <?= $link ?>
                        </li>
                    <? endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="article">
        <div class="wrapper">
            <div class="articleContentBlock">
                <? the_content(); ?>
            </div>
        </div>
    </div>

<? endwhile; // End of the loop. ?>

<?php get_footer() ?>
