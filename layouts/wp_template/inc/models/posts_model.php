<?php

namespace VirgilSecurity\Models;


use Timber\Post;
use Timber\Timber;
use VirgilSecurity\Models\Src\LayoutModel;
use WP_Post;
use WP_Term;

class PostsModel extends LayoutModel
{
    /** @var */
    private $topPosts;

    /** @var */
    private $siteTags;


    public function __construct($topPosts, $siteTags = [])
    {
        $this->topPosts = $topPosts;
        $this->siteTags = $siteTags;
    }


    public function ArticlesSection()
    {
        global $wp_query;

        $loadMoreUrl = get_permalink(get_option('page_for_posts'));

        if ($wp_query->is_tag()) {
            $tag = $wp_query->get_queried_object();

            $loadMoreUrl = get_tag_link($tag->term_id);
        }

        return [
            'posts'      => Timber::get_posts(),
            'pagination' => Timber::get_pagination(),
            'top_posts'  => array_map(
                function (WP_Post $topPost) {
                    return new Post($topPost);
                },
                $this->topPosts
            ),
            'tags'       => array_map(
                function (WP_Term $tag) {
                    return [
                        'title' => $tag->name,
                        'link'  => get_tag_link($tag->term_id),
                    ];
                },
                $this->siteTags
            ),
            'load_more'  => [
                'pattern' => $loadMoreUrl . 'page/%page%',
            ],
        ];
    }
}
