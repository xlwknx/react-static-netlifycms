Virgil Application RESTful Service
=================

RESTful service for application managemenet

## Installation

Go to project folders

Install dependencies via [Composer](https://getcomposer.org/).

```shell
composer.phar install
```

Create database and provide credentials for it in ```database.php``` according to env.
E.g.

```php
return array(
    'connections' => array(
        'mysql' => array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'virgil_application',
            'username'  => 'root',
            'password'  => 'secret',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ),
    ),
);
```
Run database migrations.

```shell
php artisan migrate
```

## API
* [Account](#account)
    * [POST /account/signin](#post-accountsignin)
    * [POST /account/signout](#post-accountsignout)
    * [POST /account/signup]
* [Application](#application)
    * [GET /application/get/application/{application-id}]
    * [GET /application/list]
    * [GET /application/reset-key/{application-id}]
    * [POST /application]
    * [PUT /application]
    * [DELETE /application/{application-id}]
* [Appendix A. Repsonses](#appendix-a-responses)

#Account
**`Account`** entity endpoints

##POST /account/signin
Retrieve authentication token.

Service will create **`Authentication token`** that will be available during the 60 minutes after creation. During this time service will automatically prolong life time of the token in case if **`Authentication token`** widely used so don't need to prolong it manually. In case when **`Authentication token`** is used after 60 minutes of life time, service will throw the appropriate error.

Request info
```
HTTP Request method    POST
Request URL            http://api.virgilsecurity.com/account/signin
Authorization Token    Not needed
```

Request body
```json
{
  "account": {
    "username": "suhinin.dmitriy@gmail.com",
    "password": "password"
  }
}
```

Response body
```json
{
  "auth_token": "dbbbe6a906aa4d567531827beb66a2aadbbbe6a906aa4d567531827beb66a2aa"
}
```

Request sample
```
curl -v -X POST http://api.virgilsecurity.com/account/signin -data {"account": {"username": "suhinin.dmitriy@gmail.com", "password": "password"}}
```

##POST /account/signout

Request info
```
HTTP Request method    POST
Request URL            http://api.virgilsecurity.com/account/signout
Authorization Token    Not needed
```

Request body
```json
{
  "auth_token": "dbbbe6a906aa4d567531827beb66a2aadbbbe6a906aa4d567531827beb66a2aa"
}
```

Response body
```
-
```

Request sample
```
curl -v -X POST http://api.virgilsecurity.com/account/signout -data {"auth_token": "dbbbe6a906aa4d567531827beb66a2aadbbbe6a906aa4d567531827beb66a2aa"}
```

##POST /account/signup

Request info
```
HTTP Request method    POST
Request URL            http://api.virgilsecurity.com/account/signup
Authorization Token    Not needed
```

Request body
```json
{
  "account": {
    "username": "suhinin.dmitriy@gmail.com",
    "password": "password",
    "type": 1
  }
}
```

Response body
```json
{
  "account": {
    "id": 1,
    "type": 1,
    "username": "suhinin.dmitriy@gmail.com"
  }
}
```

Request sample
```
curl -v -X POST http://api.virgilsecurity.com/account/signup -data {"account": {"username": "suhinin.dmitriy@gmail.com", "password": "password", "type":1}}

```


#Appendix A. Responses
Application uses standard HTTP response codes:
```
200 - Success
400 - Request error
401 - Authorization error
500 - Server error
```

Addtitional information about the error is returned as JSON-object like:
```json
{
    "error": {
        "code": "{error-code}"
    }
}
```

**`HTTP 501. Server error`** status is returned on internal server error
```
10001 - Internal application error. Route was not found.
10002 - Internal application error. Route not allowed.
```

**`HTTP 400. Request error`** status is returned on request data validation errors
```
30001 - Account was not found
30002 - Account already exists
30003 - Account usernname was not provided
30004 - Account password was not provided
30005 - Account type was not provided
30006 - Account tpe was not found

40001 - Authentication token was not found
40002 - Authentication token was expired

50001 - Application name was not provided
50002 - Application description was not provided
50003 - Application url was not provided
50004 - Application was not found
50005 - Application limit was exeeded
50006 - Application key was not found
50007 - Application service was not recognized
50008 - Application call limit was exceeded
```
