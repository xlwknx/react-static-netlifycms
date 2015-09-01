<?php

use Application as ApplicationModel;

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
                'applicationList' => App::make('getCurrentAccount')->getApplicationList()
            )
        );
    }

    public function createApplication() {

        $this->setActivePage('dashboard');
        $this->layout->content = View::make(
            'pages.application.create'
        );
    }

    public function updateApplication($applicationId) {

        $this->setActivePage('dashboard');
        $this->layout->content = View::make(
            'pages.application.update',
            array(
                'application' => App::make('getCurrentAccount')->getApplication(
                    $applicationId
                )
            )
        );
    }

    public function deleteApplication($applicationId) {

        App::make('getCurrentAccount')->getApplication(
            $applicationId
        )->delete();

        return Redirect::to('/dashboard');
    }


}