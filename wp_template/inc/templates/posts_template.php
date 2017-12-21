<?php

namespace VirgilSecurity\Templates;


use Timber\Timber;
use VirgilSecurity\Models\PostsModel;
use VirgilSecurity\Templates\Src\Template;

class PostsTemplate extends Template
{
    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'posts.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        //$title = get_the_title(get_option('page_for_posts'));

        $recentPosts = wp_get_recent_posts(['numberposts' => 3], OBJECT);

        $tagsList = get_tags();

        return new PostsModel($recentPosts, $tagsList);
    }
}
