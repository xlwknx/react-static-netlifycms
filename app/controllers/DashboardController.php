<?php


class DashboardController extends AbstractController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.private';

    public function index() {

        $this->layout->content = View::make(
            'pages.dashboard.index'
        );
    }
}