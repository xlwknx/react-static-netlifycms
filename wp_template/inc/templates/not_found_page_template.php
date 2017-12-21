<?php

namespace VirgilSecurity\Templates;


use VirgilSecurity\Models\NotFoundPageModel;
use VirgilSecurity\Templates\Src\Template;

class NotFoundPageTemplate extends Template
{
    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return '404.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new NotFoundPageModel(
            '404', 'Page not found', 'The Page you are looking for doesn’t exist or an other
                                    occurred. <br> Go back, or head over to main page to choose a new directions</p>', [
                     [
                         'class' => 'button-raisedRed',
                         'title' => 'Main page',
                         'link'  => get_site_url(),
                     ],
                     [
                         'class' => 'button-flat',
                         'title' => 'Go back',
                         'link'  => wp_get_referer() ? wp_get_referer() : get_site_url(),
                     ],
                 ]
        );
    }
}
