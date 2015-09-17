<?php

use Virgil\Helper\UUID;

class Application extends Eloquent {

    protected $table = 'account_application';

    protected $fillable = array(
        'name',
        'description',
        'url'
    );

    /**
     * Override save method to automatically generate UUID
     * @param array $options
     */
    public function save(array $options = array()) {

        $this->attributes['uuid'] = UUID::make();
        parent::save($options);

        return $this;
    }

    /**
     * Many To One relationship between Application and Account model
     * @return mixed
     */
    public function account() {

        return $this->belongsTo('Account');
    }

    /**
     * One To Many relationship between Application and Application Token model
     * @return mixed
     */
    public function tokens() {

        return $this->hasMany('ApplicationToken');
    }

}