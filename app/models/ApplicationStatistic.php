<?php

class ApplicationStatistic extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_application_statistic';

    public static function log(Application $application, AllowedService $service) {

        $statistic = new \ApplicationStatistic();
        $statistic->account_id = $application->account->id;
        $statistic->application_id = $application->id;
        $statistic->service_id = $service->id;

        $statistic->save();
    }

    public static function getServiceLimit(Application $application, AllowedService $service) {

        return DB::table('service_application_statistic')
            ->where('account_id', '=', $application->account->id)
            ->where('application_id', '=', $application->id)
            ->where('service_id', '=', $service->id)
            ->where(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), '=', date('Y-m'))
            ->count();
    }
}