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
    * [POST /account/signin]
    * [POST /account/signout]
    * [POST /account/signup]
* [Application](#application)
    * [GET /application/get/application/{application-id}]
    * [GET /application/list]
    * [GET /application/reset-key/{application-id}]
    * [POST /application]
    * [PUT /application]
    * [DELETE /application/{application-id}]
* [Appendix A. Repsonses](#appendix-a-responses)


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
