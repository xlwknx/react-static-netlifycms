<?php

class DashboardController extends AbstractController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.public';

    public function index() {

        $this->setActivePage('dashboard');
        $this->layout->content = View::make(
            'pages.dashboard.index',
            array(
                'applicationList' => array()
            )
        );
    }
}