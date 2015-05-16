VirgilAuthService
=================

* [Virgil authentification service] (#virgil-authentification-service)
	* [POST /get-message](#post-get-message)
	* [POST /verify-message] (#post-verify-message)
	* [GET /verify-token/{token}] (#get-verify-tokentoken)
	* [GET /token/{token}/info] (#get-tokentokeninfo)
* [Appendix A. Response codes] (#appendix-a-response-codes)

# Virgil authentification service
service is designed to get ability authenticate users who use Virgil keys. The working principle presented below on the scheme
![alt tag](https://github.com/ddain/VirgilAuthService/blob/master/doc/scheme-1.jpg)

## POST /get-message
Retrieve encrypted message

Request info
```
HTTP Request method    POST
Request URL            https://auth.virgilsecurity.com/get-message
```

Request body
```json
{
	"id": {
		"email": "test@example.com"
	},
	"app_id": "application_id"
}
```
Where ```id``` is object where key is user data type (eg. email) and value is user data value.
```app_id``` is application id (eg. chrome-ext, ios-app, virgil-sync etc.)

Response body
```json
{
	"id": {
		"email": "test@example.com"
	},
	"app_id": "application_id",
	"encrypted_data": "BASE64-ENCODED-DATA",
	"embed_content_info": true,
	"recipient_public_key_id": "cfc71f7c-560d-4a62-8d65-16b87419a554"
	"sign": {
		"hash_name": "sha512",
		"signed_digest": "BASE64_ENCODED_DATA",
		"signer_public_key_id": "cd171f7c-560d-4a62-8d65-16b87419a58c"
	}
}
```
Where ```id``` and ```app_id``` are values which presented at the request.
```encrypted_data``` is encrypted and then base64 encoded data with embedded content info. Client should base64 decode and decrypt data using flag ```embed_content_info = true;```. 
Sign object contains ```hash_name```, ```signed_digest``` and ```signer_public_key_id```, which requires to create sign object.

Request sample
```
curl -v -X POST https://auth.virgilsecurity.com/get-message --data '{"id":{"email":"test@example.com"},"app_id": "application_id"}'
```
When client retrievs response from the server, client has to verify sign. See example below:
```php
$signer = new \VirgilSigner();

$virgilSign = new \VirgilSign();
$virgilSign->fromJson(($sign)); // $sign is json object from response

$signer->verify(base64_decode($encrypted_data), $virgilSign, $signerPublicKey); // $encrypted_data - encrypted_data from response. $signerPublicKey - signer public key (in this case this is a VirgilAuthService public key).
```
After verifying sign client has to decrypt message:
```php 
$cipher = new \VirgilCipher();

$cipher->decryptWithKey(base64_decode($encrypted_data), $publicKeyId, $privateKey, $password); // encrypted_data - from response, publicKeyId - recipient public key id, privateKey - recipient private key
```
After that client has to encrypt message, sign and send to [/verify-message] (#post-verify-message). To encrypt data client has to use Virgil Auth Service public key. Example how to encrypt data see below:

```php
$cipher = new \VirgilCipher();

$cipher->addKeyRecipient($publicKeyId, $publicKey); // publicKeyId - virgil auth service public key id, publicKey - virgil auth public key

$encryptedData = $cipher->encrypt($data, true);

$dataToSend = base64_encode($encryptedData); // data which should be send to the server
```



## POST /verify-message
Verify decripted message

Request info
```
HTTP Request method    POST
Request URL            https://auth.virgilsecurity.com/verify-message
```

Request body
```json
{
	"id": {
		"email": "test@example.com"
	},
	"app_id": "application_id",
	"encrypted_data": "BASE64-ENCODED-DATA",
	"sign": {
		"hash_name": "sha512",
		"signed_digest": "BASE64_ENCODED_DATA",
		"signer_public_key_id": "cd171f7c-560d-4a62-8d65-16b87419a58c"
	}
}
```
Where ```id``` and ```app_id``` values which presented in first request. ```encrypted_data``` data which was retrieved form server decrypted, encrypted using Virgil Auth service public key and base64 encoded. 
```sign``` is object which was retrieved by signing encrypted data before base64 encoding. See example below:
```php
$signer = new \VirgilSigner();

$sign = $signer->sign($data, $signerPublicKeyId, $privateKey, $password); data - encrypted data before base 64 encoding. signer public key id, private key, password - user public key id, private key and password.
$sign->toJSON();
```

Response body
```json
{
	"id": {
		"email": "test@example.com"
	},
	"app_id": "application_id",
	"token": "token",
	"sign": {
		"hash_name": "sha512",
		"signed_digest": "BASE64_ENCODED_DATA",
		"signer_public_key_id": "cd171f7c-560d-4a62-8d65-16b87419a58c"
	}
}
```

Request sample
```
curl -v -X POST https://auth.virgilsecurity.com/verify-message --data '{"id":{"email":"test@example.com"},"app_id":"application_id","encrypted_data:"BASE64_ENCODED_DATA","encryption_key":"BASE64_ENCODED_DATA","sign":{"hash_name":"sha512","signed_digest":"BASE64_ENCODED_DATA","signer_public_key_id":"cd171f7c-560d-4a62-8d65-16b87419a58c"}}'
```

# GET /verify-token/{token}
Verify if token is active

Request info
```
HTTP Request method    POST
Request URL            https://auth.virgilsecurity.com/verify-token/{token}
```

Request body
```
-
```

Response body
```json
{
	"is_active": true
}
```

Request sample
```
curl -v -X GET https://auth.virgilsecurity.com/verify-token/{token}
```

## GET /token/{token}/info
Retrieve account info by token

Request info
```
HTTP Request method    POST
Request URL            https://auth.virgilsecurity.com/token/{token}/info
```

Request body
```
-
```

Response body
```json
{
	"first_name": "First name",
	"last_name": "Last name"
}
```

Request sample
```
curl -v -X GET https://auth.virgilsecurity.com/token/{token}/info
```

#Appendix A. Response codes
Application uses standard HTTP response codes:
```
200 - Success
400 - Request error
404 - Entity not found
500 - Server error
```

Addtitional information about the error is returned as JSON-object like:
```json
{
    "code": {error-code}
}
```

**`HTTP 500. Server error`** status is returned on internal application errors


**`HTTP 400. Request error`** status is returned on request data validation errors
```
441 - Unable to find public key by user data
442 - Message verification failed
443 - Invalid user data value or type
444 - Invalid signature 
445 - Invalid token
446 - User data not found on PKI
447 - Unable to get public key from PKI
```
