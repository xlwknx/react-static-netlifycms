# Public Keys Management API #
PKI service is responsible for management of user's identities (like email, mobile, etc.) and corresponding public keys.

Service entities are: 

- Account - represents the service customer. Top-level entity that aggregates all user's public keys. 
- Public Key - holds public key information for user's account and aggregates user identities related to this public key.
- UserData - validated user information pieces that use public key to encrypt the data.

Detailed endpoints information:

- [Public Keys Management](http://markdownpad.com)
- [User Data Management]()
- [Search]()
- [Error Codes]()

##Public Keys Management##

 * [POST /objects/public-key (ADD use-case)](#post-objectspublic-key-add-use-case)
 * [POST /objects/public-key (CREATE use-case)](#post-objectspublic-key-create-use-case)
 * [GET /objects/public-key/{public-key-id}](#get-objectspublic-keypublic-key-id)

Create **`Public Key`** endpoint has two different use-cases:
* **`ADD`**. Creates **`Public Key`** for **`Account`** specified by **account_id** parameter. The authorization is **NEEDED** and **account_id** parameter required.
* **`CREATE`**. Creates new **`Public key`**. The authorization is **NOT NEEDED** and **account_id** parameter is omitted.

**user_data** parameter is optional when **`Public Key`** get created.

##POST /objects/public-key (ADD use-case)
Request info
```
HTTP Request method    POST
Request URL            https://pki.virgilsecurity.com/objects/public-key
Authorization          Needed
Parameters             public_key - base64 encoded public key string
```

Request body
```json
{
    "account_id": "30a7e1b3-e763-4789-a54d-fcc53dcf973a",
    "public_key": "BASE64-ENCODED-STRING",
    "user_data": [                                             
        {
            "class": "user_id",
            "type": "email",
            "value": "user@virgilsecurity.com"
        },
        {
            "class": "user_id",
            "type" : "domain",
            "value": "helpdsk.virgilsecurity.com"
        },
    ],
    "guid": "a53e98e4-0197-4513-be6d-49836e406aaa"
}
```

Response body
```json
{
    "id" : {
        "account_id": "3a768eea-cbda-4926-a82d-831cb89092aa",
        "public_key_id": "17084b40-08f5-4bcd-a739-c0d08c176bad"
    },
    "public_key": "BASE64-ENCODED-STRING",
    "user_data": []
}
```

Request sample
```
curl -v -X POST https://pki.virgilsecurity.com/objects/public-key --data '{"account_id": "30a7e1b3-e763-4789-a54d-fcc53dcf973a", "public_key" : "BASE64-ENCODED-STRING", "guid": "a53e98e4-0197-4513-be6d-49836e406aaa"}'
```

##POST /objects/public-key (CREATE use-case)
Request info
```
HTTP Request method    POST
Request URL            https://pki.virgilsecurity.com/objects/public-key
Authorization          Not Needed
```

Request body
```json
{
    "public_key": "BASE64-ENCODED-STRING",
    "user_data": [                                              
        {
            "class": "user_id",
            "type": "email",
            "value": "user@virgilsecurity.com"
        },
        {
            "class": "user_id",
            "type": "application",
            "value": "helpdesk.virgilsecurity.com"
        },
    ],
    "guid": "a53e98e4-0197-4513-be6d-49836e406aaa"
}
```

Response body
```json
{
    "id": {
        "account_id": "3a768eea-cbda-4926-a82d-831cb89092aa",
        "public_key_id": "17084b40-08f5-4bcd-a739-c0d08c176bad"
    },
    "public_key": "BASE64-ENCODED-STRING",
    "user_data": []
}
```

Request sample
```
curl -v -X POST https://pki.virgilsecurity.com/objects/public-key --data '{"public_key" : "BASE64-ENCODED-STRING", "guid": "a53e98e4-0197-4513-be6d-49836e406aaa"}'
```

##GET /objects/public-key/{public-key-id}
Retrieve the information on **`Public Key`** including all nested **`UserData`** items.

Request info
```
HTTP Request method    GET
Request URL            https://pki.virgilsecurity.com/objects/public-key/{public-key-id}
Authorization          Not needed
```

Request body
```
-
```

Response body
```json
{
    "id": {
        "account_id": "d63a8ffd-bdac-498c-b861-a53e11989cef",
        "public-key_id": "deb17e15-d47c-449f-b1b0-4d55247d153f"
    },
    "public_key": "BASE64-ENCODED-STRING",
    "user_data": [
        {
            "class": "user_id",
            "type": "phone",
            "value": "+1 123 777 7777",
            "is_confirmed": false
        },
        {
            "class": "user_id",
            "type": "email",
            "value": "domenik.reve@virgilsecurity.com",
            "is_confirmed": true
        }
    ]
}
```

Request sample
```
curl -v -X GET https://pki.virgilsecurity.com/objects/public-key/6480ba7a-1b68-141e-b547-ef8d9adc3145
```

##User Data Management##

 * [POST /objects/user-data](#post-objectsuserdata)
 * [POST /objects/user-data/{user-data-id}/actions/confirm](#post-objectsuser-datauser-data-idactionsconfirm)
 * [POST /objects/user-data/{user-data-id}/actions/resend-confirmation](#post-objectsuser-datauser-data-idactionsresend-confirmation)

Available UserData class/type combinations are:
* user_id 
```json
    "class": "user_id",
    "type": "email",
    "value": "user@virgilsecurity.com"
```
```json
    "class": "user_id",
    "type": "domain",
    "value": "virgilsecurity.com"
```
* user_info
```json
    "class": "user_info",
    "type": "first_name"
    "value": "Bob"
```
```json
    "class": "user_info",
    "type": "last_name"
    "value": "Bobson"
```

##POST /objects/user-data
Request info
```
HTTP Request method    POST
Request URL            https://pki.virgilsecurity.com/objects/user-data
Authorization          Needed
```

Request body
```json
{
   "public_key_id": "30a7e1b3-e763-4789-a54d-fcc53dcf973a",
   "class": "user_info",
   "type" : "last_name",
   "value": "Maley",
   "guid": "3a768eea-cbda-4926-a82d-831cb89092aa"
}
```
```json
{
   "public_key_id": "30a7e1b3-e763-4789-a54d-fcc53dcf973a",
   "class" : "user_id",
   "type" : "email",
   "value" : "daniel.rehl@virgilsecurity.com",
   "guid": "3a768eea-cbda-4926-a82d-831cb89092aa"
}
```

Response body
```json
{
    "id": {
        "account_id": "3a768eea-cbda-4926-a82d-831cb89092aa",
        "public_key_id": "17084b40-08f5-4bcd-a739-c0d08c176bad",
        "user_data_id": "e33898de-6302-4756-8f0c-5f6c5218e02e"
    },
    "class": "user_id",
    "type": "email",
    "value": "daniel.rehl@vitgilsecurity.com"
}

```

Request sample
```
curl -v -X POST https://pki.virgilsecurity.com/objects/user-data --data '{"public_key_id": "30a7e1b3-e763-4789-a54d-fcc53dcf973a", "class": "user_id", "type": "email", "value": "daniel.rehl@virgilsecurity.com", "guid": "a53e98e4-0197-4513-be6d-49836e406aaa"}'
```

##GET /objects/user-data/{user-data-id}
Retrieve the information on **`UserData`**.

Request info
```
HTTP Request method    GET
Request URL            https://pki.virgilsecurity.com/objects/user-data/{user-data-id}
Authorization          Not needed
```

Request body
```
-
```

Response body
```json
{
    "id": {
        "account_id": "e33898de-6302-4756-8f0c-5f6c5218e02e",
        "public_key_id": "30a7e1b3-e763-4789-a54d-fcc53dcf973a",
        "user_data_id": "cd171f7c-560d-4a62-8d65-16b87419a58c"
    },
    "class": "user_id",
    "type": "email",
    "value": "user@virgilsecurity.com"
}
```

Request sample
```
curl -v -X GET https://pki.virgilsecurity.com/objects/user-data/6480ba7a-1b68-141e-b547-ef8d9adc3145
```

##POST /objects/user-data/{user-data-id}/actions/confirm
Confirm **`UserData`** ownership by specifying the code received on registration

Request info
```
HTTP Request method    POST
Request URL            https://pki.virgilsecurity.com/objects/user-data/{user-data-id}/actions/confirm
Authorization          Needed
```

Request body
```json
{
    "code": "F9U0W9",
    "guid": "a53e98e4-0197-4513-be6d-49836e406aaa"
}
```

Response body
```
-
```

Request sample
```
curl -v -X POST https://pki.virgilsecurity.com/objects/user-data/6480ba7a-1b68-141e-b547-ef8d9adc3145/actions/confirm --data '{"guid": "a53e98e4-0197-4513-be6d-49836e406aaa", "code":"F9U0W9"}'
```

##POST /objects/user-data/{user-data-id}/actions/resend-confirmation
Resend the **`UserData`**'s confirmation code

Request info
```
HTTP Request method    POST
Request URL            https://pki.virgilsecurity.com/objects/user-data/{user-data-id}/actions/resend-confirmation
Authorization          Needed
```

Request body
```json
{
    "guid": "a53e98e4-0197-4513-be6d-49836e406aaa"
}
```

Response body
```
-
```

Request sample
```
curl -v -X POST https://pki.virgilsecurity.com/objects/user-data/6480ba7a-1b68-141e-b547-ef8d9adc3145/actions/resend-confirmation --data '{"guid": "a53e98e4-0197-4513-be6d-49836e406aaa"}'
```

##Search##

* [POST /objects/account/actions/search ](#post-objectsaccountactionssearch)
* [POST /objects/user-data/actions/search ](#post-objectsuser-dataactionssearch)

##POST /objects/account/actions/search
Retrieve **`Account`** entity by user data specified

Request info
```
HTTP Request method    POST
Request URL            https://pki.virgilsecurity.com/objects/account/actions/search
Authorization          Not Needed
```

Request body
```json
{
    "email": "test@test.com"
}
```

Response body
```json
[
    {
        "id": {
            "account_id": "981d9537-3cc1-1236-6d63-8a7a608f572f",
        },
        "public_keys":[
            {
                "id":{
                    "account_id": "dfb37d22-5995-bf14-46d8-0202a20f32de",
                    "public_key_id": "75a152b8-022d-6137-3f1a-dc0353639fe8"
                },
                "public_key":"tkjvnerovgboiej9u5gj4b0best"
            }
        ]
    }
]
```

Request sample
```
curl -v -X POST https://pki.virgilsecurity.com/objects/account/actions/search --data '{"email": "test@test.com"}'
```

##POST /objects/user-data/actions/search
Retrieve **`UserData`** entity by value specified

Request info
```
HTTP Request method           POST
Request URL                   https://pki.virgilsecurity.com/objects/user-data/actions/search
Authorization                 Not Needed
Optional GET paramenters      ?expand=public_key
```

Request body
```json
{
    "email": "user@virgilsecurity.com"
}
```

Response body without ?expand=public_key
```json
[
    {
        "id":{
            "account_id":"dfb37d22-5995-bf14-46d8-0202a20f32de",
            "public_key_id":"75a152b8-022d-6137-3f1a-dc0353639fe8",
            "user_data_id":"a4fc6c26-42fd-97bf-a054-0bc3341100c3"
        },
        "class":"user_id",
        "type":"email",
        "value":"user@virgilsecurity.com"
    }
]
```

Response body with ?expand=public_key
```json
[
    {
        "id":{
            "account_id":"dfb37d22-5995-bf14-46d8-0202a20f32de",
            "public_key_id":"75a152b8-022d-6137-3f1a-dc0353639fe8",
            "user_data_id":"a4fc6c26-42fd-97bf-a054-0bc3341100c3"
        },
        "class":"user_id",
        "type":"email",
        "value":"user@virgilsecurity.com",
        "expanded": {
            "public_key":{
                "id":{
                    "account_id":"dfb37d22-5995-bf14-46d8-0202a20f32de",
                    "public_key_id":"75a152b8-022d-6137-3f1a-dc0353639fe8"
                },
                "public_key":"tkjvnerovgboiej9u5gj4b0best"
            }
        }
    }
]
```

Request sample
```
curl -v -X POST https://pki.virgilsecurity.com/objects/user-data/actions/search\?expand\=public_key --data '{"email": "user@virgilsecurity.com"}'
```

##Error Codes

Application uses standard HTTP response codes:
```
200 - Success
400 - Request error
401 - Authorization error
404 - Entity not found
405 - Method not allowed
500 - Server error
```

Addititional information about the error is returned as JSON-object like:
```
{
    "error": {
        "code": {error-code}
    }
}
```

**`HTTP 500. Server error`** status is returned on internal application errors
```
10000 - Internal application error
10001 - Application kernel error
10010 - Internal application error
10011 - Internal application error
10012 - Internal application error
10100 - JSON specified as a request body is invalid
```

**`HTTP 401. Auth error`** status is returned on authorization errors
```
10200 - Guid specified is expired already
10201 - The Guid specified is invalid
10202 - The Authorization header was not specified
10203 - Public key header not specified or incorrect
10204 - The signed digest specified is incorrect
```

**`HTTP 400. Request error`** status is returned on request data validation errors
```
20000 - Account object not found for id specified
20100 - Public key object not found for id specified
20101 - Public key invalid
20102 - Public key not specified
20103 - Public key must be base64-encoded string
20200 - UserData object not found for id specified
20201 - UserData type specified is invalid
20202 - UserData type specified for user identity is invalid
20203 - Domain specified for domain identity is invalid
20204 - Email specified for email identity is invalid
20205 - Phone specified for phone identity is invalid
20206 - Fax specified for fax identity is invalid
20207 - Application specified for application identity is invalid
20208 - Mac address specified for mac address identity is invalid
20210 - UserData integrity constraint violation
20211 - UserData confirmation entity not found by code specified
20212 - UserData confirmation code invalid
20213 - UserData was already confirmed and does not need further confirmation
20214 - UserData class specified is invalid
20300 - User info data validation failed. Name is invalid
```