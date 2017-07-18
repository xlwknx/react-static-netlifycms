<?php

namespace VirgilSecurity\Templates;


use Timber\Post;
use Timber\Timber;

use VirgilSecurity\Models\SinglePostModel;
use VirgilSecurity\Templates\Src\Template;

class SinglePostTemplate extends Template
{
    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'single.twig';
    }


    public function getContext()
    {
        $context = parent::getContext();

        $post = get_post();

        $context['post'] = new Post($post->ID);

        return $context;
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new SinglePostModel();
    }
}
