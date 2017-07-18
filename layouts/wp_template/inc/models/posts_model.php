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


                    $links = get_posts(
                        ['tag' => $tag->name, 'numberposts' => 3]
                    );

                    return [
                        'name'  => $tag->name,
                        'links' => array_map(
                            function ($link) {
                                return new Post($link);
                            },
                            $links
                        ),
                    ];
                },
                $this->siteTags
            ),
        ];
    }
}
