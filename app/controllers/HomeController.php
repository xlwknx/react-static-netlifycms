<?php


class HomeController extends AbstractController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.public';

    public function index() {

        $this->setActivePage('home');
        $this->layout->content = View::make(
            'pages.home.index'
        );
    }
}