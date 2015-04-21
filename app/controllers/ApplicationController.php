<?php

use Virgil\Validator\Application as ApplicationValidator,
    Virgil\Validator\Account as AccountValidator,
    Symfony\Component\HttpFoundation\Response as HttpResponse;

class ApplicationController extends AbstractController {

    public function getOne($application) {

        return \Response::json(array(
            'data' => ApplicationValidator::exists(
                $this->getCurrentAccount(),
                $application
            )
        ), HttpResponse::HTTP_OK);

    }

    public function getAll() {

        $list = \Application::getAccountApplicationList(
            $this->getCurrentAccount()
        );

        $data = array();
        foreach($list as $application) {
            $data[] = $application->jsonSerialize();
        }

        return \Response::json(array(
            'data' => $data
        ), HttpResponse::HTTP_OK);
    }

    public function create() {

        $data = ApplicationValidator::validate(
            Input::json()->get('application', null)
        );

        AccountValidator::validateConfirmed(
            $this->getCurrentAccount()
        );

        AccountValidator::validateLimit(
            $this->getCurrentAccount()
        );

        return \Response::json(array(
            'data' => Application::createApplication(
                $this->getCurrentAccount(),
                $data
            )
        ), HttpResponse::HTTP_OK);
    }

    public function resetKey($application) {

        $application = ApplicationValidator::exists(
            $this->getCurrentAccount(),
            $application
        );

        $application->resetApplicationKey();

        return \Response::json(array(
            'data' => array(
                'key' => $application->key
            )
        ), HttpResponse::HTTP_OK);
    }

    public function update($application) {

        $application = ApplicationValidator::exists(
            $this->getCurrentAccount(),
            $application
        );

        return \Response::json(array(
            'data' => $application->updateApplication(
                ApplicationValidator::validate(
                    Input::json()->get('application', null)
                )
            )
        ), HttpResponse::HTTP_OK);
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

    public static function validateKey() {

        $data = ApplicationValidator::validateKey(
            Input::json()->get('service', null) ,
            Input::json()->get('app_key', null)
        );

        ApplicationStatistic::log(
            $data['application'],
            $data['service']
        );

        return \Response::json(array(
            'result' => true
        ), HttpResponse::HTTP_OK);
    }
} 