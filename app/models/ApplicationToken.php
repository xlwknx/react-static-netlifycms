<?php

use Virgil\Helper\Hash;

class ApplicationToken extends Eloquent {

    protected $table = 'application_token';

    /**
     * Override save method to automatically generate UUID
     * @param array $options
     */
    public function save(array $options = array()) {

        $this->token = Hash::makeApplicationToken(
            $this->application
        );

        parent::save($options);
    }

    public function changeActiveState() {

        $this->active = !$this->active;

        parent::save();
    }

    /**
     * Many To One relationship between Application Token and Application model
     * @return mixed
     */
    public function application() {

        return $this->belongsTo('Application');
    }

    /**
     * One To Many relationship between Application Token and Token Log model
     * @return mixed
     */
    public function logs() {

        return $this->hasMany('ApplicationTokenLog', 'token_id', 'id');
    }
}