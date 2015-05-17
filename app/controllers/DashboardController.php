<?php


class DashboardController extends BaseController {

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