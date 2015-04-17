<?php

class Application extends Eloquent implements JsonSerializable {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_application';

    public static function getAccountApplicationList(Account $account) {

        return \Application::where(
            'account_id', '=', $account->id
        )->get();
    }

    public static function getApplicationByKey($key) {

        return \Application::whereKey(
            $key
        )->first();
    }

    public static function createApplication(Account $account, $data) {

        $application = new Application();
        $application->account_id = $account->id;
        $application->name = $data['name'];
        $application->description = $data['description'];
        $application->url = $data['url'];
        $application->key = md5(
            $account->id . $data['name'] . $data['description'] . $data['url'] . time()
        );

        $application->save();

        return $application;
    }

    public function updateApplication($data) {

        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->url = $data['url'];

        $this->save();

        return $this;
    }

    public function resetApplicationKey() {

        $this->key = md5(
            $this->account_id . $this->name . $this->description . $this->url . time()
        );

        $this->save();

        return $this;
    }

    public function jsonSerialize() {

        return array(
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'url' => $this->url,
            'key' => $this->key
        );
    }

    public function account() {

        return $this->belongsTo('Account');
    }

} 