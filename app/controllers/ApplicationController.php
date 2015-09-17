<?php

use Virgil\Validator\Application as ApplicationValidator,
    Symfony\Component\HttpFoundation\Response as HttpResponse;

class ApplicationController extends AbstractController {

    /**
     * The layout that should be used for responses.
     */
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

            $application = Auth::user()->applications()->save(
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

    public static function validateToken() {

        $serviceId = Input::json()->get('service_id', null);
        $resource  = Input::json()->get('resource', null);
        $appToken  = Input::json()->get('app_token', null);

        $application = ApplicationValidator::validateToken(
            $appToken
        );

        ApplicationLog::log(
            $serviceId,
            $resource,
            $application
        );

        return \Response::json(array(
            'identity' => $application->getIdentity()
        ), HttpResponse::HTTP_OK);
    }
}