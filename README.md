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
20001 - Athentication password validation failed
20002 - Athentication ticket validation failed
20003 - Athentication account was not found by provided ticket 
20004 - Athentication token validation failed
20005 - Athentication token not found  
20006 - Athentication token has expired

30001 - Signed validation failed

40001 - Account validation failed
40002 - Account was not found
40003 - Account already exists
40004 - Account password was not specified
40005 - Account password validation failed
40006 - Account was not found in PKI service
40007 - Account type validation failed

50001 - Certificate validation failed
50002 - Certificate was not found
50003 - Certificate already exists
50004 - Certificate's key validation failed
50005 - Certificate's key base64 validation failed

60001 - Token was not found in request
60002 - Ticket validation failed
60003 - Account was not found by ticket
60004 - Verification token ash expired
```
