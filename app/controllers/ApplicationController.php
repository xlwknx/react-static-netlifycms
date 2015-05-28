<?php

use Virgil\Validator\Application as ApplicationValidator,
    Virgil\Validator\Account as AccountValidator,
    Symfony\Component\HttpFoundation\Response as HttpResponse;

class ApplicationController extends AbstractController {

    public function getOne($application) {

        return \Response::json(
            ApplicationValidator::exists(
                $this->getCurrentAccount(),
                $application
            ), HttpResponse::HTTP_OK
        );
    }

    public function getAll() {

        $list = \Application::getAccountApplicationList(
            $this->getCurrentAccount()
        );

        $data = array();
        foreach($list as $application) {
            $data[] = $application->jsonSerialize();
        }

        return \Response::json(
            $data,
            HttpResponse::HTTP_OK
        );
    }

    public function create() {

        $data = ApplicationValidator::validate(
            Input::json()->get('name', null),
            Input::json()->get('description', null),
            Input::json()->get('url', null)
        );

        AccountValidator::validateNotConfirmed(
            $this->getCurrentAccount()
        );

        /*
        AccountValidator::validateLimit(
            $this->getCurrentAccount()
        );
        */
        return \Response::json(
            Application::createApplication(
                $this->getCurrentAccount(),
                $data
            ), HttpResponse::HTTP_OK
        );
    }

    public function resetKey($application) {

        $application = ApplicationValidator::exists(
            $this->getCurrentAccount(),
            $application
        );

        $application->resetApplicationKey();

        return \Response::json(array(
            'key' => $application->key
        ), HttpResponse::HTTP_OK);
    }

    public function update($application) {

        $application = ApplicationValidator::exists(
            $this->getCurrentAccount(),
            $application
        );

        return \Response::json(
            $application->updateApplication(
                ApplicationValidator::validate(
                    Input::json()->get('name', null),
                    Input::json()->get('description', null),
                    Input::json()->get('url', null)
                )
            ), HttpResponse::HTTP_OK
        );
    }

    public function delete($application) {

        $application = ApplicationValidator::exists(
            $this->getCurrentAccount(),
            $application
        );

        $application->delete();

        return \Response::json(
            null,
            HttpResponse::HTTP_OK
        );
    }

    public static function validateToken() {

        $data = ApplicationValidator::validateToken(
            Input::json()->get('service_id', null),
            Input::json()->get('resource', null),
            Input::json()->get('app_token', null)
        );

        ApplicationStats::log(
            $data['service_id'],
            $data['resource'],
            $data['application']
        );

        return \Response::json(array(
            'result' => true
        ), HttpResponse::HTTP_OK);
    }
} 