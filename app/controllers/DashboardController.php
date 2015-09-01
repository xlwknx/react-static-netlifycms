<?php

use Virgil\Validator\Application as ApplicationValidator;


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

        if(Request::isMethod('post')) {

            $result = ApplicationValidator::validateCreate(
                Input::all()
            );

            if($result instanceof Illuminate\Http\RedirectResponse) {
                return $result;
            }

            App::make('getCurrentAccount')->createApplication(
                $result
            );

            return Redirect::to('/dashboard');
        }

        $this->setActivePage('dashboard');
        $this->layout->content = View::make(
            'pages.application.create'
        );
    }

    public function updateApplication($uuid) {

        if(Request::isMethod('post')) {

            $result = ApplicationValidator::validateCreate(
                Input::all()
            );

            if($result instanceof Illuminate\Http\RedirectResponse) {
                return $result;
            }

            App::make('getCurrentAccount')->getApplication(
                $uuid
            )->updateApplication(
                $result
            );

            return Redirect::to('/dashboard');
        }

        $this->setActivePage('dashboard');
        $this->layout->content = View::make(
            'pages.application.update',
            array(
                'app' => App::make('getCurrentAccount')->getApplication(
                    $uuid
                ),
                'uuid' => $uuid
            )
        );
    }

    public function deleteApplication($uuid) {

        App::make('getCurrentAccount')->getApplication(
            $uuid
        )->delete();

        return Redirect::to('/dashboard');
    }
}