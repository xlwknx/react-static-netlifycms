<?php


class IndexController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.public';


    public function aboutUs() {

        $this->layout->content = View::make(
            'pages.index.about-us'
        );

        View::share('title', 'Virgil | Contact Us');
    }

    public function contactUs() {

        $this->layout->content = View::make(
            'pages.index.contact-us',
            array(
                'title' => 'Virgil | Contact Us'
            )
        );
    }

    public function downloads() {

        $this->layout->content = View::make(
            'pages.index.downloads',
            array(
                'title' => 'Virgil | Downloads'
            )
        );
    }

    public function documents() {

        $this->layout->content = View::make(
            'pages.index.documents',
            array(
                'title' => 'Virgil | Documents'
            )
        );
    }
}