<?php

class ApplicationTokenLog extends Eloquent {

    protected $table = 'application_token_log';

    protected $fillable = array(
        'service_id',
        'resource'
    );

    /**
     * Many To One relationship between Application Log and Application Token model
     * @return mixed
     */
    public function token() {

        return $this->belongsTo('ApplicationToken', 'token_id', 'id');
    }

}