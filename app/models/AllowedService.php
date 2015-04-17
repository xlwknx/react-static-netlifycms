<?php

class AllowedService extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_allowed_service';

    public static function getServiceByName($service) {

        return \AllowedService::whereService(
            $service
        )->first();
    }
} 