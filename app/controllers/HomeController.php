<?php


class HomeController extends AbstractController {

    protected $layout = 'layouts.public';

    public function index() {

        $this->setActivePage('home');
        $this->layout->content = View::make(
            'pages.home.index'
        );
    }
}