<?php

use Virgil\Helper\Hash;

class ApplicationToken extends Eloquent {

    protected $table = 'application_token';

    /**
     * Override save method to automatically generate UUID
     * @param array $options
     */
    public function save(array $options = array()) {

        $this->attributes['token'] = Hash::make(
            $this->application
        );

        parent::save($options);
    }

    /**
     * Many To One relationship between Application Token and Application model
     * @return mixed
     */
    public function application() {

        return $this->belongsTo('Application');
    }

}