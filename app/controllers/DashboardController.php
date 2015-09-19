<?php

class DashboardController extends AbstractController {

    protected $layout = 'layouts.public';

    public function index() {

        $this->setActivePage('dashboard');
        $this->layout->content = View::make(
            'pages.dashboard.index'
        );
    }
}