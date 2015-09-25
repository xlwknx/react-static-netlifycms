<?php

use Virgil\Validator\Application as ApplicationValidator,
    Virgil\Auth;

class ApplicationController extends AbstractController {

    protected $layout = 'layouts.public';

    public function create() {

        if(Request::isMethod('post')) {

            $validator = Validator::make(
                Input::all(), ApplicationValidator::getApplicationValidatorRules()
            );

            if($validator->fails()) {
                return Redirect::to('/dashboard/application/create')->withInput()->withErrors(
                    $validator
                );
            }

            Auth::user()->applications()->save(
                new Application(
                    Input::all()
                )
            );

            return Redirect::to('/dashboard');
        }

        $this->setActivePage('dashboard');
        $this->layout->content = View::make(
            'pages.application.create'
        );
    }

    public function update() {

        $application = App::make('getApplication');

        if(Request::isMethod('post')) {

            $validator = Validator::make(
                Input::all(), ApplicationValidator::getApplicationValidatorRules()
            );

            if($validator->fails()) {
                return Redirect::to('/dashboard/application/update')->withInput()->withErrors(
                    $validator
                );
            }

            $application->update(
                Input::all()
            );

            return Redirect::to('/dashboard');
        }

        $this->setActivePage('dashboard');
        $this->layout->content = View::make(
            'pages.application.update', [
                'application' => $application
            ]
        );
    }
}