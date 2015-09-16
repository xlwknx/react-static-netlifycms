<?php

class ApplicationLog extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'application_log';

    /**
     * Log Application call
     *
     * @param $serviceId
     * @param $resource
     * @param Application $application
     */
    public static function log($serviceId, $resource, Application $application) {

        $statistic = new \ApplicationLog();
        $statistic->service_id     = $serviceId;
        $statistic->resource       = $resource;
        $statistic->account_id     = $application->account->id;
        $statistic->application_id = $application->id;

        $statistic->save();
    }
}