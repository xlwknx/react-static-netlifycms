<?php


class HomeController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.home';

    public function index() {

        $this->layout->content = View::make(
            'pages.home.index'
        );
    }
}