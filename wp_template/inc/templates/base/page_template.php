<?php

namespace VirgilSecurity\Templates\Base;


use VirgilSecurity\Models\PageModel;

use VirgilSecurity\Templates\Src\Template;

class PageTemplate extends Template
{
    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'page.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        $post = get_post();

        return new PageModel(
            $post->post_title,
            $post->post_content,
            isset($post->custom['content_menu_item']) ? $post->custom['content_menu_item'] : []
        );
    }
}
