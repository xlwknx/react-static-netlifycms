<?php

class Application extends Eloquent implements JsonSerializable {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_account_application';

    /**
     * Get Application list by account
     *
     * @param Account $account
     * @return mixed
     */
    public static function getAccountApplicationList(Account $account) {

        return \Application::where(
            'account_id', '=', $account->id
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
        $application->account_id = $account->id;
        $application->name = $data['name'];
        $application->description = $data['description'];
        $application->url = $data['url'];
        $application->token = md5(
            $account->id . $data['name'] . $data['description'] . $data['url'] . time()
        );

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

        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->url = $data['url'];

        $this->save();

        return $this;
    }

    /**
     * Reset Application token
     *
     * @return $this
     */
    public function resetApplicationToken() {

        $this->token = md5(
            $this->account_id . $this->name . $this->description . $this->url . time()
        );

        $this->save();

        return $this;
    }

    /**
     * Serialize Application instance
     *
     * @return array|mixed
     */
    public function jsonSerialize() {

        return array(
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'url' => $this->url,
            'key' => $this->token
        );
    }

    /**
     * Get Account relation instance
     *
     * @return mixed
     */
    public function account() {

        return $this->belongsTo('Account');
    }

} 