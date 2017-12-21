<?php

namespace VirgilSecurity\Models;


use VirgilSecurity\Models\Src\LayoutModel;

use WP_Post;
use WP_Query;
use WP_Term;

class SinglePostModel extends LayoutModel
{
    /** @var WP_Post */
    private $post;


    public function __construct(WP_Post $post)
    {
        $this->post = $post;
    }


    public function ArticleSection()
    {
        $postTags = wp_get_post_tags($this->post->ID);

        $posts = [];

        $tags = array_map(
            function (WP_Term $tag) {
                return $tag->slug;
            },
            $postTags
        );

        $my_query = new WP_Query(
            [
                'posts_per_page'      => 5,
                'post__not_in'        => [$this->post->ID],
                'tag_slug__in'        => $tags,
                'ignore_sticky_posts' => 1,
            ]
        );


        if ($my_query->have_posts()) {

            while ($my_query->have_posts()) {
                $my_query->the_post();

                $posts[] = [
                    'title' => get_the_title(),
                    'link'  => get_permalink(),
                ];
            }
        }

        wp_reset_query();

        return [
            'related' => $posts,
        ];
    }
}
