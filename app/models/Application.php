<?php

use Application as ApplicationModel,
    Virgil\Helper\UUID;

class Application extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_account_application';

    /**
     * Get Application by Application UUID
     *
     * @param Account $account
     * @param $uuid
     * @return mixed
     */
    public static function getApplication(Account $account, $uuid) {

        return ApplicationModel::whereAccountId(
            $account->id
        )->whereUuid(
            $uuid
        )->first();
    }

    /**
     * Get Application list by account
     *
     * @param Account $account
     * @return mixed
     */
    public static function getApplicationList(Account $account) {

        return ApplicationModel::whereAccountId(
            $account->id
        )->get();
    }

    /**
     * Get Application instance by Application token
     *
     * @param $token
     * @return mixed
     */
    public static function getApplicationByToken($token) {

        return \Application::whereToken(
            $token
        )->first();
    }

    /**
     * Create new Application instance
     *
     * @param Account $account
     * @param $data
     * @return Application
     */
    public static function createApplication(Account $account, $data) {

        $application = new Application();
        $application->account_id  = $account->id;
        $application->name        = $data['application_name'];
        $application->description = $data['application_description'];
        $application->url         = $data['application_url'];
        $application->token       = md5(
            implode(
                '',
                array(
                    $account->id,
                    $data['application_name'],
                    $data['application_description'],
                    $data['application_url'],
                    time()
                )
            )
        );

        $application->uuid  = UUID::generate();

        $application->save();

        return $application;
    }

    /**
     * Update existing Application instance
     *
     * @param $data
     * @return $this
     */
    public function updateApplication($data) {

        $this->name        = $data['application_name'];
        $this->description = $data['application_description'];
        $this->url         = $data['application_url'];

        $this->save();

        return $this;
    }

    /**
     * Reset Application token
     *
     * @return $this
     */
    public function resetToken() {

        $this->token = md5(
            $this->account_id . $this->name . $this->description . $this->url . time()
        );

        $this->save();

        return $this;
    }

    /**
     * Get Account relation instance
     *
     * @return mixed
     */
    public function account() {

        return $this->belongsTo('Account');
    }

    /**
     * Get Application identity like: com.virgilsecurity.pass
     *
     * @return string
     */
    public function getIdentity() {

        return $this->uuid;
    }

} 