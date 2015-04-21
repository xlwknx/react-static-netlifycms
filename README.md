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
    * [POST /account/signup](#post-accountsignup)
* [Application](#application)
    * [GET /application/get/application/{application-id}](#get-applicationgetapplication-id)
    * [GET /application/list](#get-applicationlist)
    * [GET /application/reset-key/{application-id}](#get-applicationreset-key1)
    * [POST /application](#post-application)
    * [PUT /application/{application-id}](#put-application1)
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

#Application
**`Application`** entity endpoints

##GET /application/get/{application-id}
Retrieve application by application id.

Request info
```
HTTP Request method    GET
Request URL            http://api.virgilsecurity.com/application/get/1
Authorization Token    Needed
```

Header info
```
x-auth-token: a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8
```

Request body
```json
-
```

Response body
```json
{
  "data": {
    "id": 1,
    "name": "First Virgil Application",
    "description": "First amazing Virgil application",
    "url": "http://application.url.com",
    "key": "a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8"
  }
}
```

Request sample
```
curl -v -X GET http://api.virgilsecurity.com/application/get/1
```

##GET /application/list
Retrieve application list.

Request info
```
HTTP Request method    GET
Request URL            http://api.virgilsecurity.com/application/list
Authorization Token    Needed
```

Header info
```
x-auth-token: a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8
```

Request body
```json
-
```

Response body
```json
{
  "data": [
    {
        "id": 1,
        "name": "First Virgil Application",
        "description": "First amazing Virgil application",
        "url": "http://application.url.com",
        "key": "a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8"
    },
    {
        "id": 2,
        "name": "Another Virgil Application",
        "description": "Another amazing Virgil application",
        "url": "http://application.url.com",
        "key": "12398f263b78e356e0871234152efa82f266db6521123e76c29a19c882919293"
    }
  ]
}
```

Request sample
```
curl -v -X GET http://api.virgilsecurity.com/application/list
```

##GET /application/reset-key/1
Reset old application key and retrive new one.

Request info
```
HTTP Request method    GET
Request URL            http://api.virgilsecurity.com/application/reset-key/1
Authorization Token    Needed
```

Header info
```
x-auth-token: a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8
```

Request body
```json
-
```

Response body
```json
{
  "data": {
        "key": "a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8"
    }
}
```

Request sample
```
curl -v -X GET http://api.virgilsecurity.com/application/reset-key/1
```

##POST /application
Create new application instance.

Request info
```
HTTP Request method    POST
Request URL            http://api.virgilsecurity.com/application
Authorization Token    Needed
```

Header info
```
x-auth-token: a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8
```

Request body
```json
{
    "application": {
        "name": "First Virgil Application",
        "description": "First amazing Virgil application",
        "url": "http://application.url.com"
    }
}
```

Response body
```json
{
  "data": {
        "id": 1,
        "name": "First Virgil Application",
        "description": "First amazing Virgil application",
        "url": "http://application.com",
        "key": "a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8"
    }
}
```

Request sample
```
curl -v -X POST http://api.virgilsecurity.com/application -data {"application":{"name": "First Virgil application", "description": "First amazing Virgil application", "url": "http://application.com"}}
```

##PUT /application/1
Update existing application instance.

Request info
```
HTTP Request method    PUT
Request URL            http://api.virgilsecurity.com/application/1
Authorization Token    Needed
```

Header info
```
x-auth-token: a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8
```

Request body
```json
{
    "application": {
        "name": "First Virgil Application",
        "description": "First amazing Virgil application",
        "url": "http://application.url.com"
    }
}
```

Response body
```json
{
  "data": {
        "id": 1,
        "name": "First Virgil Application",
        "description": "First amazing Virgil application",
        "url": "http://application.com",
        "key": "a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8"
    }
}
```

Request sample
```
curl -v -X PUT http://api.virgilsecurity.com/application/1 -data {"application":{"id": 1, "name": "First Virgil application", "description": "First amazing Virgil application", "url": "http://application.com"}}
```

##DELETE /application/1
DELETE existing application instance.

Request info
```
HTTP Request method    DELETE
Request URL            http://api.virgilsecurity.com/application/1
Authorization Token    Needed
```

Header info
```
x-auth-token: a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8
```

Request body
```json
-
```

Response body
```json
-
```

Request sample
```
curl -v -X DELETE http://api.virgilsecurity.com/application/1
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
