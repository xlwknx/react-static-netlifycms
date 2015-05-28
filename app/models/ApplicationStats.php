<?php

class ApplicationStats extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_account_application_stats';

    /**
     * Log Application call
     *
     * @param $serviceId
     * @param $resource
     * @param Application $application
     */
    public static function log($serviceId, $resource, Application $application) {

        $statistic = new \ApplicationStats();
        $statistic->service_id = $serviceId;
        $statistic->resource   = $resource;
        $statistic->account_id = $application->account->id;
        $statistic->application_id = $application->id;

        $statistic->save();
    }
}