VirgilKeyRing RESTful Service
=================

RESTful service for private keys managing

## API
* [Authentication](#authentication)
    * [POST /authentication/get-token](#get-authenticationget-token)
* [Key](#key)
    * [GET /private-key/account/{account-id}](#get-keyaccountaccount-id)
    * [GET /private-key/public-key/{public-key-id}](#get-keycertificatecertificate-id)
    * [POST /private-key](#post-key)
    * [DELETE /private-key](#delete-key)
* [Account](#account)
    * [POST /account](#post-account)
    * [PUT /account](#put-account)
    * [PUT /account/reset](#put-accountreset)
    * [PUT /account/verify](#put-accountverify)
    * [DELETE /account](#delete-account)
* [Appendix A. Repsonses](#appendix-a-responses)
* [Appendix B. Sign Parameter](#appendix-b-sign-parameter)

#Authentication
**`Authentication`** entity endpoints

##GET /authentication/get-token
Retrieve authentication token.

Service will create **`Authentication token`** that will be available during the 60 minutes after creation. During this time service will automatically prolong life time of the token in case if **`Authentication token`** widely used so don't need to prolong it manually. In case when **`Authentication token`** is used after 60 minutes of life time, service will throw the appropriate error.

Request info
```
HTTP Request method    POST
Request URL            http://keyring.virgilsecurity.com/authentication/get-token
Authorization Token    Not needed
```

Request body
```json
{
  "password": "password",
  "user_data": {
    "class": "user_id",
    "type": "email",
    "value": "mail@gmail.com"
  }
}
```

Response body
```json
{
  "auth_token": "dbbbe6a906aa4d567531827beb66a2aadbbbe6a906aa4d567531827beb66a2aa",
}
```

Request sample
```
curl -v -X GET http://keyring.virgilsecurity.com/authentication/get-token
```

#Private Key
**`Private Key`** entity endpoints

##GET /private-key/account/{account-id}
Retrieve Private Key information for requested account.

Header info
```
x-auth-token: a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8
```

Request info
```
HTTP Request method    GET
Request URL            http://keyring.virgilsecurity.com/private-key/account/{account-id}
Authorization Token    Needed
```

Request body
```
-
```

Response body
```json
{
  "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
  "account_type": "easy",
  "data": [
        {
            "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
            "private_key": "BASE64-ENCODED-STRING"
        },
        {
            "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
            "private_key": "BASE64-ENCODED-STRING"
        }
    ]
}
```

Request sample
```
curl -v -X GET http://keyring.virgilsecurity.com/private-key/account/6480ba7a-1b68-141e-b547-ef8d9adc3145
```

##GET /private-key/public-key/{public-key-id}
Get Private Key data by public key.

Header info
```
x-auth-token: a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8
```

Request info
```
HTTP Request method    GET
Request URL            http://keyring.virgilsecurity.com/private-key/public-key/{public-key-id}
Authorization Token    Needed
```

Request body
```
-
```

Response body
```json
{
  "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
  "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
  "private_key": "BASE64-ENCODED-STRING"
}
```

Request sample
```
curl -v -X GET http://keyring.virgilsecurity.com/private-key/public-key-id/6480ba7a-1b68-141e-b547-ef8d9adc3145
```

##POST /private-key
Create Private Key data.

Request info
```
HTTP Request method    POST
Request URL            http://keyring.virgilsecurity.com/private-key
Authorization          Not needed
```

Request body
```json
{
  "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
  "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
  "sign": "BASE64-ENCODED-STRING",
  "private_key": "BASE64-ENCODED-STRING"
}
```

Response body
```json
{
  "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
  "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
  "private_key": "BASE64-ENCODED-STRING"
}
```

Request sample
```
curl -v -X POST http://keyring.virgilsecurity.com/private-key -data {"account_id": "6F9619FF-8B86-D011-B42D-00CF4FC964F1","public_key_id": "6F34195F-9A86-B022-B65D-22CF4FC456F1","key": "BASE64-ENCODED-STRING", "sign": "BASE64-ENCODED-STRING"}
```

##DELETE /private-key
Delete Private Key data by public key.

Request info
```
HTTP Request method    DELETE
Request URL            http://keyring.virgilsecurity.com/private-key
Authorization          Not needed
```

Request body
```json
{
  "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
  "sign": "BASE64-ENCODED-STRING"
}
```

Response body
```
-
```

Request sample
```
curl -v -X DELETE http://keyring.virgilsecurity.com/private-key --data '{"public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633", "digest": "BASE64-ENCODED-STRING"}'
```

#Account
**`Account`** entity endpoints

##POST /account
Create Account information.

Request info
```
HTTP Request method    POST
Request URL            http://keyring.virgilsecurity.com/account
Authorization          Not needed
```

Request body
```json
{
  "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
  "account_type": "normal",
  "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
  "sign": "BASE64-ENCODED-STRING",
  "password": "password",
}
```

OR

```json
{
  "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
  "account_type": "easy",
  "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
  "sign": "BASE64-ENCODED-STRING",
  "password": "password"
}
```

Response body
```json
{
  "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
}
```

Request sample
```
curl -v -X POST http://keyring.virgilsecurity.com/account --data '{"account_id": "6F9619FF-8B86-D011-B42D-00CF4FC964F1", "account_type":"normal", "password": "password", "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633", "sign": "BASE64-ENCODED-STRING"}'
```

##PUT /account
Update Account information.

Request info
```
HTTP Request method    PUT
Request URL            http://keyring.virgilsecurity.com/account
Authorization          Not needed
```

Request body
```json
{
  "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
  "account_type": "normal",
  "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
  "sign": "BASE64-ENCODED-STRING",
  "password": "password"
}
```

OR

```json
{
  "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
  "account_type": "easy",
  "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
  "sign": "BASE64-ENCODED-STRING",
  "password": "password"
}
```

Response body
```
-
```

Request sample
```
curl -v -X PUT http://keyring.virgilsecurity.com/account --data '{"account_id": "6F9619FF-8B86-D011-B42D-00CF4FC964F1", "account_type":"normal", "password": "password", "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633", "sign": "BASE64-ENCODED-STRING"}'
```

##PUT /account/reset
Rest Account password.

Request info
```
HTTP Request method    PUT
Request URL            http://keyring.virgilsecurity.com/account/reset
Authorization          Not needed
```

Request body
```json
{
  "user_data": {
    "class": "user_id",
    "type": "email",
    "value": "mail@gmail.com"
  },
  "new_password": "new_password"
}
```

Response body
```
-
```

Request sample

```
curl -v -X PUT http://keyring.virgilsecurity.com/account/reset --data '{"user_data": {"class": "user_id", "type": "email",
"value": "user_name@gmail.com"}, "password": "new_password"}'
```

##PUT /account/verify
Verify password token and re-encrypt key data with the new password.

Request info
```
HTTP Request method    PUT
Request URL            http://keyring.virgilsecurity.com/account/verify
Authorization          Not needed
```

Request body
```json
{
  "token": "f2d6ed7d3509295265c6e4e37e141db0",
}
```

Response body
```json
{
  "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
  "data": [
        {
            "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
            "private_key": "BASE64-ENCODED-STRING"
        },
        {
            "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
            "private_key": "BASE64-ENCODED-STRING"
        }
    ]
}
```

Request sample
```
curl -v -X PUT http://keyring.virgilsecurity.com/account/verify --data '{"token": "f2d6ed7d3509295265c6e4e37e141db0"}'
```

##DELETE /account
Delete account object by account id.

Request info
```
HTTP Request method    DELETE
Request URL            http://keyring.virgilsecurity.com/account
Authorization          Not needed
```

Request body
```json
{
  "account_id": "6480ba7a-1b68-141e-b547-ef8d9adc3145",
  "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
  "sign": "BASE64-ENCODED-STRING"
}
```

Response body
```
-
```

Request sample
```
curl -v -X DELETE http://keyring.virgilsecurity.com/account --data '{"account_id": "6480ba7a-1b68-141e-b547-ef8d9adc3145", "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633", "sign": "BASE64-ENCODED-STRING"}'
```

#Appendix A. Responses
Application uses standard HTTP response codes:
```
200 - Success
400 - Request error
401 - Authorization error
500 - Server error
```

Additional information about the error is returned as JSON-object like:
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
20002 - Athentication user data validation failed
20003 - Athentication account was not found by provided user data
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

50001 - Public Key validation failed
50002 - Public Key was not found
50003 - Public Key already exists
50004 - Public Key private key validation failed
50005 - Public Key private key base64 validation failed

60001 - Token was not found in request
60002 - User Data validation failed
60003 - Account was not found by user data
60004 - Verification token ash expired
```

#Appendix B. Sign Parameter
The **Sign** parameter is calculated on client according next rules:

```
SIGN = VirgilSigner::sign(PUBLIC_KEY, PUBLIC_KEY, PRIVATE_KEY)
SIGN = base64_encode(SIGN->toJson())
```

* **PUBLIC_KEY** - public key that will be signed with private key
* **PUBLIC_KEY** - The KeyRing public key
* **PRIVATE_KEY** - KeyRing private key
* **VirgilSigner::sign** - Virgil Security library method to sign the data

###Server Sign validation
To authorize the request on server, this step is executed:

```
VIRGIL_SIGN = VirgilSign()
VIRGIL_SIGN->fromJson(base64_decode(SIGN))
VirgilSigner::verify(PUBLIC_KEY, VIRGIL_SIGN, PUBLIC_KEY) === True
```

* **PUBLIC_KEY** - The KeyRing public key
* **VIRGIL_SIGN** - signed public key
* **PUBLIC_KEY** - the public key extracted from the PKI service
* **VirgilSigner::verify** - Virgil Security low-level API function to verify the sign
