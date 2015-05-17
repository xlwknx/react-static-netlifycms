<?php


class PublicController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.public';

    public function aboutUs() {

        $this->layout->content = View::make(
            'pages.public.about-us'
        );
    }

    public function contactUs() {

        $this->layout->content = View::make(
            'pages.public.contact-us'
        );
    }

    public function downloads() {

        $this->layout->content = View::make(
            'pages.public.downloads'
        );
    }

    public function documents() {

        $this->layout->content = View::make(
            'pages.public.documents'
        );
    }
}