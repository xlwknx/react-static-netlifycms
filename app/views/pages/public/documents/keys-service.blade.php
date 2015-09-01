@section('keys-docs')
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h2>Public Keys RESTful API</h2>
				<p>
					A public keys RESTful API allows users of the Internet and other public networks to engage in 
					secure communication, data exchange and money exchange. This is done through public and private cryptographic 
					key pairs provided by a virgil security crypto library.
				</p>
				<h2 id="create-public-key">Create Public Key</h2>
				<p>The endpoint’s purpose is to upload Public Keys for the application.</p>
				<p>
				    The Virgil Account will be created implicitly when the first Public Key
					uploaded. The application can get the information about Public Keys
					created only for current application. When application uploads new Public
					Key and there is an Account created for another application with the
					same user identity, the Public Key will be implicitly attached to the existing
					Account instance.
				</p>

				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<td style="white-space: nowrap" >HTTP Request method</td>
						<td>POST</td>
					</tr>
					<tr>
						<td style="white-space: nowrap" >Request URL</td>
						<td>https://keys.virgilsecurity.com/v2/public-key</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td style="white-space: nowrap" >X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
                            Application token. This header is mandatory for all the requests to
                            distinguish between different applications requests
						</td>
					</tr>
					<tr>
						<td>X-VIRGIL-REQUEST-SIGN</td>
						<td>
							The request body sign (base64 encoded representation) that used to make sure user is the holder of the private
							key. This is the result of Virgil Crypto library sign process for the request
							data using user’s private key. The public key that wa specified in the request body will be
                            used to verify the sign.
						</td>
					</tr>
				</table>
												
				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>public_key</td>
						<td>
							A public key is generated with Crypto Library and converted to Base64 format. Please see more details 
							about public/private kay pair generation <a href="quickstart#generate-keys">here.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>user_data</td>
						<td>
							The list of user data items for the public key. It must contain at least one user identity entity</td>
						<td>object</td>
					</tr>
					<tr>
						<td>request_sign_uuid</td>
						<td>Random UUID to guarantee the uniqueness of the request body</td>
						<td>uuid</td>
					</tr>
				</table>

				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{  
  "public_key":
    "LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUlHYk1CUUdCeXFHU000OUFnRUdDU3NrQXdN 
     Q0NBRUJEUU9CZ2dBRVorVEt6SDMxSXRFNFZmMU8vczZHNVQ2NAovRjYwTk80WDhlcUlvM1lNQ  
     UhKOE1LbHMybFE4QTloY1VLbzFJdkxiYm5BMTVhUzNITmVMWHVtckM0aDEvQXdZCnBkQ0h4Y3  
     EvQ29rYWNNWlRld2pVcnNmdUhxREp2REtYY0d3aWZMWGdVenNmT1FaRTJlNkJhOFcySXZicHc  
     0Z0cKaHpjaWFRZkJJd0IvSkdtMEwxZz0KLS0tLS1FTkQgUFVCTElDIEtFWS0tLS0tCg==",
  "user_data":[  
    {  
      "class":"user_id",
      "type":"email",
      "value":"user@virgilsecurity.com"
    },
    {  
      "class":"user_id",
      "type":"email",
      "value":"user@gmail.com"
    },
    {  
      "class":"user_info",
      "type":"first_name",
      "value":"Mark"
    },
    {  
      "class":"user_info",
      "type":"last_name",
      "value":"Smith"
    }
  ],
  "request_sign_uuid":"57e0a766-28ef-355e-7ca2-d8a2dcf23fc4"
}</code></pre>
				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">{  
  "id":{  
    "account_id":"e2cc7feb-8729-b77d-503f-b6c2652e60e4",
    "public_key_id":"42c19fc7-72ff-a646-5f99-e505c9522e19"
  },
  "public_key":
    "LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUlHYk1CUUdCeXFHU000OUFnRUdDU3NrQXdN 
     Q0NBRUJEUU9CZ2dBRVorVEt6SDMxSXRFNFZmMU8vczZHNVQ2NAovRjYwTk80WDhlcUlvM1lNQ 
     UhKOE1LbHMybFE4QTloY1VLbzFJdkxiYm5BMTVhUzNITmVMWHVtckM0aDEvQXdZCnBkQ0h4Y3 
     EvQ29rYWNNWlRld2pVcnNmdUhxREp2REtYY0d3aWZMWGdVenNmT1FaRTJlNkJhOFcySXZicHc 
     0Z0cKaHpjaWFRZkJJd0IvSkdtMEwxZz0KLS0tLS1FTkQgUFVCTElDIEtFWS0tLS0tCg",
  "user_data":[  
    {  
      "id":{  
        "account_id":"e2cc7feb-8729-b77d-503f-b6c2652e60e4",
        "public_key_id":"42c19fc7-72ff-a646-5f99-e505c9522e19",
        "user_data_id":"eae1d29d-a81a-9d19-ba43-33d0ce320f54"
      },
      "class":"user_id",
      "type":"email",
      "value":"user@virgilsecurity.com",
      "is_confirmed":false
    },
    {  
      "id":{  
        "account_id":"e2cc7feb-8729-b77d-503f-b6c2652e60e4",
        "public_key_id":"42c19fc7-72ff-a646-5f99-e505c9522e19",
        "user_data_id":"5be1a153-0787-3456-5faf-42c446c1140f"
      },
      "class":"user_id",
      "type":"email",
      "value":"user@gmail.com",
      "is_confirmed":false
    },
    {  
      "id":{  
        "account_id":"e2cc7feb-8729-b77d-503f-b6c2652e60e4",
        "public_key_id":"42c19fc7-72ff-a646-5f99-e505c9522e19",
        "user_data_id":"3433be27-eb46-f935-57d6-4a5703da35ee"
      },
      "class":"user_info",
      "type":"first_name",
      "value":"Mark",
      "is_confirmed":true
    },
    {  
      "id":{  
        "account_id":"e2cc7feb-8729-b77d-503f-b6c2652e60e4",
        "public_key_id":"42c19fc7-72ff-a646-5f99-e505c9522e19",
        "user_data_id":"3d7b8881-9273-58ec-8dcc-01737ecacb97"
      },
      "class":"user_info",
      "type":"last_name",
      "value":"Smith",
      "is_confirmed":true
    }
  ]
}</code></pre>
				
				<h2 id="get-public-key">Get Public Key</h2>
				<p>
					The endpoint’s purpose is to get Public Key’s data.
				</p>
				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<td style="white-space: nowrap" >HTTP Request method</td>
						<td>GET</td>
					</tr>
					<tr>
						<td style="white-space: nowrap" >Request URL</td>
						<td>https://keys.virgilsecurity.com/v2/public-key/{public-key-id}</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td style="white-space: nowrap" >X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
                            Application token. This header is mandatory for all the requests to
                            distinguish between different applications requests
						</td>
					</tr>
				</table>

				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">No request body</code></pre>

				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">{  
  "id":{  
    "account_id":"e2cc7feb-8729-b77d-503f-b6c2652e60e4",
    "public_key_id":"42c19fc7-72ff-a646-5f99-e505c9522e19"
  },
  "public_key":
    "LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUlHYk1CUUdCeXFHU000OUFnRUdDU3NrQXdN 
     Q0NBRUJEUU9CZ2dBRVorVEt6SDMxSXRFNFZmMU8vczZHNVQ2NAovRjYwTk80WDhlcUlvM1lNQ 
     UhKOE1LbHMybFE4QTloY1VLbzFJdkxiYm5BMTVhUzNITmVMWHVtckM0aDEvQXdZCnBkQ0h4Y3 
     EvQ29rYWNNWlRld2pVcnNmdUhxREp2REtYY0d3aWZMWGdVenNmT1FaRTJlNkJhOFcySXZicHc 
     0Z0cKaHpjaWFRZkJJd0IvSkdtMEwxZz0KLS0tLS1FTkQgUFVCTElDIEtFWS0tLS0tCg"
}</code></pre>

				<h2 id="update-public-key">Update Public Key</h2>
				<p>
					The endpoint’s purpose is to update public key’s data.
				</p>
				<p>
					User still controls the Public/Private Keys pair and provides request sign
					for authentication purposes. That’s why user authorisation is required via
					<b>X-VIRGIL-REQUEST-SIGN</b> HTTP header. Public Key modification takes
					place immediately after endpoint invocation.
				</p>
				<p>
					Previous Public + Private keys pair is used for sign in HTTP headers, new
					Public + Private keys pair is used for sign in request body
				</p>
				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<td style="white-space: nowrap" >HTTP Request method</td>
						<td>PUT</td>
					</tr>
					<tr>
						<td style="white-space: nowrap" >Request URL</td>
						<td>https://keys.virgilsecurity.com/v2/public-key/{public-key-id}</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td >X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
                            Application token. This header is mandatory for all the requests to
                            distinguish between different applications requests
						</td>
					</tr>
					<tr>
						<td>X-VIRGIL-REQUEST-SIGN</td>
						<td>
							The request body sign (base64 encoded representation) that used to make sure user is the holder of the private
							key. This is the result of Virgil Crypto library sign process for the request
							data using user’s private key.
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap" >X-VIRGIL-REQUEST-SIGN-PK-ID</td>
						<td>
							 The Public Key UUID value. Must match {public_key_id} URL part
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>public_key</td>
						<td>
							A public key is generated with Crypto Library and converted to Base64 format. Please see more details 
							about public/private kay pair generation <a href="quickstart#generate-keys">here.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>request_sign_uuid</td>
						<td>Random UUID to guarantee the uniqueness of the request body</td>
						<td>uuid</td>
					</tr>
					<tr>
						<td>uuid_sign</td>
						<td>
							Base64 encoded request_sign_uuid parameter value signed with new private key value. Required to make sure user holds new Private Key.</td>
						<td>string</td>
					</tr>
				</table>

				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{  
  "public_key":
    "LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUlHYk1CUUdCeXFHU000OUFnRUdDU3NrQXdN 
     Q0NBRUJEUU9CZ2dBRVorVEt6SDMxSXRFNFZmMU8vczZHNVQ2NAovRjYwTk80WDhlcUlvM1lNQ 
     UhKOE1LbHMybFE4QTloY1VLbzFJdkxiYm5BMTVhUzNITmVMWHVtckM0aDEvQXdZCnBkQ0h4Y3 
     EvQ29rYWNNWlRld2pVcnNmdUhxREp2REtYY0d3aWZMWGdVenNmT1FaRTJlNkJhOFcySXZicHc 
     0Z0cKaHpjaWFRZkJJd0IvSkdtMEwxZz0KLS0tLS1FTkQgUFVCTElDIEtFWS0tLS0tCg==",
  "request_sign_uuid":"57e0a766-28ef-355e-7ca2-d8a2dcf23fc4", 
  "uuid_sign": 
    "MIGaMA0GCWCGSAFlAwQCAgUABIGIMIGFAkEAkclanc9ylpYQe7/ 
     KAdh1ZbFf+4Yqh0wgOhQa5C7GWcWkcSJ26ZGjIrKwLXiNlFg7Z2/ 
     rEK1DrCPkjXn7qxSg5AJAddynbrcve3jqV1eExNePSecEJwZNMmlKI6Tc0dOI0XdD3zufpetp 
     4aDsLbbbicFr43qnHhQoibOEtOomuL44PQ=="
}</code></pre>

				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">{  
  "id":{  
    "account_id":"e2cc7feb-8729-b77d-503f-b6c2652e60e4",
    "public_key_id":"42c19fc7-72ff-a646-5f99-e505c9522e19"
  },
  "public_key":
    "LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUlHYk1CUUdCeXFHU000OUFnRUdDU3NrQXdN 
     Q0NBRUJEUU9CZ2dBRVorVEt6SDMxSXRFNFZmMU8vczZHNVQ2NAovRjYwTk80WDhlcUlvM1lNQ 
     UhKOE1LbHMybFE4QTloY1VLbzFJdkxiYm5BMTVhUzNITmVMWHVtckM0aDEvQXdZCnBkQ0h4Y3 
     EvQ29rYWNNWlRld2pVcnNmdUhxREp2REtYY0d3aWZMWGdVenNmT1FaRTJlNkJhOFcySXZicHc 
     0Z0cKaHpjaWFRZkJJd0IvSkdtMEwxZz0KLS0tLS1FTkQgUFVCTElDIEtFWS0tLS0tCg"
}</code></pre>

<h2 id="delete-public-key">Delete Public Key</h2>
				<p>
					The endpoint’s purpose is to remove public key’s data.
				</p>
				<p>
					If signed version of the endpoint is used, the public key will be removed
					immediately without any confirmation.
				</p>
				<p>
					If unsigned version of the endpoint is used the confirmation is required.
					The endpoint will return <strong>action_token</strong> response object property and will
					send confirmation tokens on all public key’s confirmed UDIDs. The list of
					masked user identities will be returned in <strong>user_ids</strong> response object property. To
					commit public key remove POST /v2/public_key{public_key_id}/persist
					endpoint invocation needed with <strong>action_token</strong> value and the list of
					confirmation codes.
				</p>
				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<td style="white-space: nowrap" >HTTP Request method</td>
						<td>DELETE</td>
					</tr>
					<tr>
						<td style="white-space: nowrap" >Request URL</td>
						<td>https://keys.virgilsecurity.com/v2/public-key/{public-key-id}</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td >X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
                            Application token. This header is mandatory for all the requests to
                            distinguish between different applications requests
						</td>
					</tr>
					<tr>
						<td>X-VIRGIL-REQUEST-SIGN</td>
						<td>
							 Optional request body sign (base64 encoded representation)
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap" >X-VIRGIL-REQUEST-SIGN-PK-ID</td>
						<td>
							 Optional Public Key UUID value. Must match {public_key_id} URL part
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>request_sign_uuid</td>
						<td> 
						    Random uuid to guarantee the uniqueness of the request body. The parameter 
						    is not needed for not signed calls for the endpoint
						</td>
						<td>uuid</td>
					</tr>
				</table>

				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{
  "request_sign_uuid": "57e0a766-28ef-355e-7ca2-d8a2dcf23fc4"
}</code></pre>

				<h4>Response Data Example (Signed version)</h4>
				<pre><code class="langauge-json">{}</code></pre>

				<h4>Response Data Example (Unsigned version)</h4>
				<pre><code class="langauge-json">{  
  "action_token":“57516f1b-f17c-3154-c91e-edb86c514c5d",
  "user_ids":[  
    "us . . . . . . me@virgilsecurity.com",
    "de . . . . . . ko@virgilsecurity.com"
  ]
}</code></pre>

<h2 id="reset-public-key">Reset Public Key</h2>
				<p>
					The endpoint’s purpose is to reset user’s public key’s data if user lost his
					Private Key and is unable to sign the request for PUT /v2/public-key/
					{public_key_id} endpoint.
				</p>
				<p>
					After endpoint invocation the user will receive the confirmation tokens on
					all his confirmed UDIDs. The Public Key data won’t be updated until
					<b>POST /v2/public-key/{public_key_id}/persist</b> endpoint is invoked with
					token value from this step and confirmation codes sent to UDIDs. 
				</p>
				<p>
					The list of UDIDs used as confirmation tokens recipients will be listed as
					<b>user_ids</b> response parameters.
				</p>
				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<td style="white-space: nowrap" >HTTP Request method</td>
						<td>POST</td>
					</tr>
					<tr>
						<td style="white-space: nowrap" >Request URL</td>
						<td>https://keys.virgilsecurity.com/v2/public-key/{public_key_id}/actions/reset</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td style="white-space: nowrap" >X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
                            Application token. This header is mandatory for all the requests to
                            distinguish between different applications requests
						</td>
					</tr>
					<tr>
						<td>X-VIRGIL-REQUEST-SIGN</td>
						<td>
							The request body sign (base64 encoded
						    representation) that used to make sure user is the holder of the private
							key. This is the result of Virgil Crypto library sign process for the request
							data using user’s private key. The public key to verify the sign is retrieved
							from the <p>public_key</p> request parameter.
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>public_key</td>
						<td>
							Public key in Base64 encoding. This Public Key will be used to verify the request sing</td>
						<td>string</td>
					</tr>
					<tr>
						<td>request_sign_uuid</td>
						<td> 
						    Random uuid to guarantee the uniqueness of the request body. The parameter 
						    is not needed for not signed calls for the endpoint
						</td>
						<td>uuid</td>
					</tr>
				</table>

				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{
  "public_key":
    "LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUlHYk1CUUdCeXFHU000OUFnRUdDU3NrQXdN
     Q0NBRUJEUU9CZ2dBRVorVEt6SDMxSXRFNFZmMU8vczZHNVQ2NAovRjYwTk80WDhlcUlvM1lNQ
     UhKOE1LbHMybFE4QTloY1VLbzFJdkxiYm5BMTVhUzNITmVMWHVtckM0aDEvQXdZCnBkQ0h4Y3
     EvQ29rYWNNWlRld2pVcnNmdUhxREp2REtYY0d3aWZMWGdVenNmT1FaRTJlNkJhOFcySXZicHc
     0Z0cKaHpjaWFRZkJJd0IvSkdtMEwxZz0KLS0tLS1FTkQgUFVCTElDIEtFWS0tLS0tCg==",
  "request_sign_uuid": "57e0a766-28ef-355e-7ca2-d8a2dcf23fc4"
}</code></pre>

				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">{
  "action_token": "e2cc7feb-8729-b77d-503f-b6c2652e60e4",
  "user_ids": [
    "am.........o@gmail.com",
    "us.........r@gmail.com"
  ]
}</code></pre>

<p>
	Please be aware that the new value for the Public Key won’t be applied
	until <a href="#persist-public-key">Persist Public Key</a> endpoint invoked
</p>

<h2 id="persist-public-key">Persist Public Key</h2>
				<p>
					The endpoint’s purpose is to confirm public key’s data if <b>X-VIRGILREQUEST-SIGN</b>
					HTTP header was omitted on <a href="#delete-public-key">Delete Public Key</a> or <a href="#reset-public-key">Reset Public Key</a>
					endpoint was invoked.
				</p>
				<p>
					In this case user must collect all confirmation codes sent to all confirmed
					UDIDs and specify them in the request body in confirmation_codes
					parameter as well ac action_token parameter received on previous
					endpoint
				</p>
				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<td style="white-space: nowrap" >HTTP Request method</td>
						<td>POST</td>
					</tr>
					<tr>
						<td style="white-space: nowrap" >Request URL</td>
						<td>https://keys.virgilsecurity.com/v2/public-key/{public_key_id}/persist</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td style="white-space: nowrap" >X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
                            Application token. This header is mandatory for all the requests to
                            distinguish between different applications requests
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>action_token</td>
						<td>
							The action token received on <a href="#delete-public-key">Delete Public Key</a> 
							or <a href="#reset-public-key">Reset Public Key</a> endpoint invocation</td>
						<td>string</td>
					</tr>
					<tr>
						<td>confirmation_codes</td>
						<td> 
						     The list of confirmation codes received on all confirmed UDIDs
						</td>
						<td>array</td>
					</tr>
				</table>

				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{
  "action_token": "42c19fc7-72ff-a646-5f99-e505c9522e19",
  "confirmation_codes": ["A4D2B6", "B4G3F1"]
}</code></pre>

				<h4>Response Data Example (For Delete action)</h4>
				<pre><code class="langauge-json">{}</code></pre>

				<h4>Response Data Example (For Reset action)</h4>
				<pre><code class="langauge-json">{  
  "id":{  
    "account_id":"e2cc7feb-8729-b77d-503f-b6c2652e60e4",
    "public_key_id":"42c19fc7-72ff-a646-5f99-e505c9522e19"
  },
  "public_key":
    "LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUlHYk1CUUdCeXFHU000OUFnRUdDU3NrQXdN 
     Q0NBRUJEUU9CZ2dBRVorVEt6SDMxSXRFNFZmMU8vczZHNVQ2NAovRjYwTk80WDhlcUlvM1lNQ 
     UhKOE1LbHMybFE4QTloY1VLbzFJdkxiYm5BMTVhUzNITmVMWHVtckM0aDEvQXdZCnBkQ0h4Y3 
     EvQ29rYWNNWlRld2pVcnNmdUhxREp2REtYY0d3aWZMWGdVenNmT1FaRTJlNkJhOFcySXZicHc 
     0Z0cKaHpjaWFRZkJJd0IvSkdtMEwxZz0KLS0tLS1FTkQgUFVCTElDIEtFWS0tLS0tCg"
}</code></pre>

 				<h2 id="search-public-key">Search Public Key</h2>
				<p>
					The endpoint’s purpose is to search public keys by UDID values
				</p>
				<p>
					If signed version of the endpoint is used, the public key will be returned with
					all user_data items for this Public Key.
				</p>
				<p>
					If signed version of the endpoint is used request <strong>value</strong> parameter is ignored
				</p>
				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<td style="white-space: nowrap" >HTTP Request method</td>
						<td>POST</td>
					</tr>
					<tr>
						<td style="white-space: nowrap" >Request URL</td>
						<td>https://keys.virgilsecurity.com/v2/public-key/actions/grab</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td >X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
                            Application token. This header is mandatory for all the requests to
                            distinguish between different applications requests
						</td>
					</tr>
					<tr>
						<td>X-VIRGIL-REQUEST-SIGN</td>
						<td>
							 Optional request body sign (base64 encoded representation)
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap" >X-VIRGIL-REQUEST-SIGN-PK-ID</td>
						<td>
							 Optional Public Key identifier. The value is UUID of the public key to be used to verify request sign. This 
							 header is mandatory if X-VIRGIL-REQUEST-SIGN header was specified.
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>value</td>
						<td>
							Optional UDID value. May be omitted for signed request</td>
						<td>string</td>
					</tr>
					<tr>
						<td>request_sign_uuid</td>
						<td> 
						     Optional random uuid to guarantee the uniqueness of the request body. 
						     It’s mandatory only for the signed requests
						</td>
						<td>uuid</td>
					</tr>
				</table>

				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{
  "action_token": "42c19fc7-72ff-a646-5f99-e505c9522e19",
  "confirmation_codes": ["A4D2B6", "B4G3F1"]
}</code></pre>

				<h4>Response Data Example (Unsigned version)</h4>
				<pre><code class="langauge-json">{  
  "id":{  
    "account_id":"e2cc7feb-8729-b77d-503f-b6c2652e60e4",
    "public_key_id":"42c19fc7-72ff-a646-5f99-e505c9522e19"
  },
  "public_key":
    "LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUlHYk1CUUdCeXFHU000OUFnRUdDU3NrQXdN 
     Q0NBRUJEUU9CZ2dBRVorVEt6SDMxSXRFNFZmMU8vczZHNVQ2NAovRjYwTk80WDhlcUlvM1lNQ 
     UhKOE1LbHMybFE4QTloY1VLbzFJdkxiYm5BMTVhUzNITmVMWHVtckM0aDEvQXdZCnBkQ0h4Y3 
     EvQ29rYWNNWlRld2pVcnNmdUhxREp2REtYY0d3aWZMWGdVenNmT1FaRTJlNkJhOFcySXZicHc 
     0Z0cKaHpjaWFRZkJJd0IvSkdtMEwxZz0KLS0tLS1FTkQgUFVCTElDIEtFWS0tLS0tCg"
}</code></pre>

				<h4>Response Data Example (Signed version)</h4>
				<pre><code class="langauge-json">{  
  "id":{  
    "account_id":"e2cc7feb-8729-b77d-503f-b6c2652e60e4",
    "public_key_id":"42c19fc7-72ff-a646-5f99-e505c9522e19"
  },
  "public_key":
    "LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUlHYk1CUUdCeXFHU000OUFnRUdDU3NrQXdN 
     Q0NBRUJEUU9CZ2dBRVorVEt6SDMxSXRFNFZmMU8vczZHNVQ2NAovRjYwTk80WDhlcUlvM1lNQ 
     UhKOE1LbHMybFE4QTloY1VLbzFJdkxiYm5BMTVhUzNITmVMWHVtckM0aDEvQXdZCnBkQ0h4Y3 
     EvQ29rYWNNWlRld2pVcnNmdUhxREp2REtYY0d3aWZMWGdVenNmT1FaRTJlNkJhOFcySXZicHc 
     0Z0cKaHpjaWFRZkJJd0IvSkdtMEwxZz0KLS0tLS1FTkQgUFVCTElDIEtFWS0tLS0tCg",
  "user_data":[
    {
        "id":{
            "account_id":"e2cc7feb-8729-b77d-503f-b6c2652e60e4",
            "public_key_id":"42c19fc7-72ff-a646-5f99-e505c9522e19",
            "user_data_id":"eae1d29d-a81a-9d19-ba43-33d0ce320f54"
        },
        "class":"user_id",
        "type":"email",
        "value":"user@virgilsecurity.com",
        "is_confirmed":true
    },
    {
        "id":{
            "account_id":"e2cc7feb-8729-b77d-503f-b6c2652e60e4",
            "public_key_id":"42c19fc7-72ff-a646-5f99-e505c9522e19",
            "user_data_id":"5be1a153-0787-3456-5faf-42c446c1140f"
        },
        "class":"user_id",
        "type":"email",
        "value":"user@gmail.com",
        "is_confirmed":false
    },
    {
        "id":{
            "account_id":"e2cc7feb-8729-b77d-503f-b6c2652e60e4",
            "public_key_id":"42c19fc7-72ff-a646-5f99-e505c9522e19",
            "user_data_id":"3433be27-eb46-f935-57d6-4a5703da35ee"
        },
        "class":"user_info",
        "type":"first_name",
        "value":"Mark",
        "is_confirmed":true
    },
    {
        "id":{
            "account_id":"e2cc7feb-8729-b77d-503f-b6c2652e60e4",
            "public_key_id":"42c19fc7-72ff-a646-5f99-e505c9522e19",
            "user_data_id":"3d7b8881-9273-58ec-8dcc-01737ecacb97"
        },
        "class":"user_info",
        "type":"last_name",
        "value":"Smith",
        "is_confirmed":true
    }
]
}</code></pre>

				<h2 id="create-user-data">Create User Data</h2>
				<p>
					The endpoint’s purpose is to append UDIDs and UDINFOs to the Public Keys for the current application.
				</p>
				<p>
					The user data instance will be created for the Public Key instance 
					specified in <b>X-VIRGIL-REQUEST-SIGN-PK-ID</b> HTTP header. 
				</p>
				<p>
					If signed version of the endpoint is used request value parameter is ignored 
				</p>
				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<td style="white-space: nowrap" >HTTP Request method</td>
						<td>POST</td>
					</tr>
					<tr>
						<td style="white-space: nowrap" >Request URL</td>
						<td>https://keys.virgilsecurity.com/v2/user-data</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td >X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
                            Application token. This header is mandatory for all the requests to
                            distinguish between different applications requests
						</td>
					</tr>
					<tr>
						<td>X-VIRGIL-REQUEST-SIGN</td>
						<td>
							 Request body sign (base64 encoded representation)
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap" >X-VIRGIL-REQUEST-SIGN-PK-ID</td>
						<td>
							 The value is UUID of the public key to be used to verify request sign.
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>public_key_id</td>
						<td>
							Public Key UUID that will contain current user data</td>
						<td>uuid</td>
					</tr>
					<tr>
						<td>class</td>
						<td> 
						      User data class. Can be either <b>user_id</b> or <b>user_info</b>
						</td>
						<td>string</td>
					</tr>
					<tr>
						<td>type</td>
						<td> 
						      User data type. Can be either <b>first_name</b>, <b>last_name</b> for <b>user_info</b> class, or email for <b>user_id</b> class
						</td>
						<td>string</td>
					</tr>
					<tr>
						<td>request_sign_uuid</td>
						<td> 
						      Random uuid to guarantee the uniqueness of the request body
						</td>
						<td>uuid</td>
					</tr>
				</table>

				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{
  "class": "user_id",
  "type": "email",
  "value": "user@virgilsecurity.com",
  "request_sign_uuid": "57e0a766-28ef-355e-7ca2-d8a2dcf23fc4"
}</code></pre>

				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">{
  "id": {
    "account_id": "e2cc7feb-8729-b77d-503f-b6c2652e60e4",
    "public_key_id": "42c19fc7-72ff-a646-5f99-e505c9522e19”,
    "user_data_id": "e33898de-6302-4756-8f0c-5f6c5218e02e"
  },
  "class": "user_id",
  "type": "email",
  "value": "user@virgilsecurity.com",
  "is_confirmed": false
}</code></pre>

<p>Please be aware that user data item won’t be returned until it was
confirmed. The user data item will be attached to the Public Key
specified in X-VIRGIL-PUBLIC-KEY-ID HTTP header</p>


				<h2 id="delete-user-data">Delete User Data</h2>
				<p>
					The endpoint’s purpose is to remove user data item from the public key.
				</p>
				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<td style="white-space: nowrap" >HTTP Request method</td>
						<td>DELETE</td>
					</tr>
					<tr>
						<td style="white-space: nowrap" >Request URL</td>
						<td>https://keys.virgilsecurity.com/v2/user-data/{user_data_id}</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td >X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
                            Application token. This header is mandatory for all the requests to
                            distinguish between different applications requests
						</td>
					</tr>
					<tr>
						<td>X-VIRGIL-REQUEST-SIGN</td>
						<td>
							 Request body sign (base64 encoded representation)
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap" >X-VIRGIL-REQUEST-SIGN-PK-ID</td>
						<td>
							 The value is UUID of the public key to be used to verify request sign.
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>request_sign_uuid</td>
						<td> 
						      Random uuid to guarantee the uniqueness of the request body
						</td>
						<td>uuid</td>
					</tr>
				</table>

				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{
  "request_sign_uuid": "57e0a766-28ef-355e-7ca2-d8a2dcf23fc4"
}</code></pre>

				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">{}</code></pre>

				<h2 id="persist-user-data">Persist User Data</h2>
				<p>
					The endpoint’s purpose is to confirm user data item.
				</p>
				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<td style="white-space: nowrap" >HTTP Request method</td>
						<td>POST</td>
					</tr>
					<tr>
						<td style="white-space: nowrap" >Request URL</td>
						<td>https://keys.virgilsecurity.com/v2/user-data/{user_data_id}/persist</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td style="white-space: nowrap">X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
                            Application token. This header is mandatory for all the requests to
                            distinguish between different applications requests
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>confirmation_code</td>
						<td> 
						      Confirmation code sent to UDID
						</td>
						<td>uuid</td>
					</tr>
				</table>

				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{
  "confirmation_code": "A3F4S3"
}</code></pre>

				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">{}</code></pre>		

				<h2 id="resend-confirmation-user-data">Resend Confirmation User Data</h2>
				<p>
					The endpoint’s purpose is to confirm user data item.
				</p>
				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<td style="white-space: nowrap" >HTTP Request method</td>
						<td>POST</td>
					</tr>
					<tr>
						<td style="white-space: nowrap" >Request URL</td>
						<td>https://keys.virgilsecurity.com/v2/user-data/{user_data_id}/actions/resend-confirmation</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td style="white-space: nowrap">X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
                            Application token. This header is mandatory for all the requests to
                            distinguish between different applications requests
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap">X-VIRGIL-REQUEST-SIGN</td>
						<td>
							  Request body sign (base64 encoded representation)
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap">X-VIRGIL-REQUEST-SIGN-PK-ID</td>
						<td>
							 The value is UUID of the public key to be used to verify request sign.
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>request_sign_uuid</td>
						<td> 
						      Random uuid to guarantee the uniqueness of the request body
						</td>
						<td>uuid</td>
					</tr>
				</table>

				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{
  "request_sign_uuid": "57e0a766-28ef-355e-7ca2-d8a2dcf23fc4"
}</code></pre>

				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">{}</code></pre>				

				
				<h2 id="error-codes">Error Codes</h2>

				<table class="table">
					<tr><td>10000<td>The error code returned to the user in the case of some internal error that must not be specified to client
					<tr><td>10100<td>JSON specified as a request is invalid
				</table>

				<h3>Request Sign Errors</h3>
				<table class="table">
					<tr><td>10200<td>The request_sign_uuid parameter was already used for another request
					<tr><td>10201<td>The request_sign_uuid parameter is invalid
					<tr><td>10202<td>The request sign header not found
					<tr><td>10203<td>The Public Key header not specified or incorrect
					<tr><td>10204<td>The request sign specified is incorrect
					<tr><td>10207<td>The Public Key UUID passed in header was not confirmed yet
					<tr><td>10209<td>Public Key specified in authorization header is registered for another application
					<tr><td>10210<td>Public Key value in request body for POST /public-key endpoint must be base64 encoded value
					<tr><td>10211<td>Public Key UUIDs in URL part and X-VIRGIL-REQUEST-SIGN-PK-ID header must match
				</table>	

				<h3>Application Token Errors</h3>
				<table class="table">
					<tr><td>10205<td>The Virgil application token not specified or invalid
					<tr><td>10206<td>The Virgil statistics application error
				</table>		

				<h3>Endpoints Errors</h3>
				<table class="table">
					<tr><td>10208<td>Public Key value required in request body
					<tr><td>20000<td>Account object not found for id specified
					<tr><td>20010<td>Action token is invalid, expired on not found
					<tr><td>20011<td>Action token's confirmation codes number doesn't match
					<tr><td>20012<td>One of action token's confirmation codes is invalid
					<tr><td>20100<td>Public Key object not found for id specified
					<tr><td>20101<td>Public key length invalid
					<tr><td>20102<td>Public key not specified
					<tr><td>20103<td>Public key must be base64-encoded string
					<tr><td>20104<td>Public key must contain confirmed UserData entities
					<tr><td>20105<td>Public key must contain at least one "user ID" entry
					<tr><td>20107<td>There is UDID registered for current application already
					<tr><td>20108<td>UDIDs specified are registered for several accounts
					<tr><td>20110<td>Public key is not found for any application
					<tr><td>20111<td>Public key is found for another application
					<tr><td>20112<td>Public key is registered for another application
					<tr><td>20113<td>Sign verification failed for request UUID parameter in PUT /public-key
					<tr><td>20200<td>User Data object not found for id specified
					<tr><td>20202<td>User Data type specified as user identity is invalid
					<tr><td>20203<td>Domain value specified for the domain identity is invalid
					<tr><td>20204<td>Email value specified for the email identity is invalid
					<tr><td>20205<td>Phone value specified for the phone identity is invalid
					<tr><td>20210<td>User Data integrity constraint violation
					<tr><td>20211<td>User Data confirmation entity not found
					<tr><td>20212<td>User Data confirmation token invalid
					<tr><td>20213<td>User Data was already confirmed and does not need further confirmation
					<tr><td>20214<td>User Data class specified is invalid
					<tr><td>20215<td>Domain value specified for the domain identity is invalid
					<tr><td>20216<td>This user id had been confirmed earlier
					<tr><td>20217<td>The user data is not confirmed yet
					<tr><td>20218<td>The user data value is required
					<tr><td>20300<td>User info data validation failed
				</table>				

				<h4>Error Response Example</h4>
				<pre><code class="langauge-json">{
  "error": {
    "code": ERROR_CODE
  }
}</code></pre>

			</div>
			<div class="col-md-3 scrollspy">
                    <ul class="nav hidden-xs hidden-sm dev-sidenav" data-spy="affix" data-offset-top="250" >                
			            <li class="title" role="presentation"><p>Public Keys RESTful API</p></li>
			            <li role="presentation"><a href="#create-public-key">Create Public Key</a></li>
			            <li role="presentation"><a href="#get-public-key">Get Public Key</a></li>
			            <li role="presentation"><a href="#update-public-key">Update Public Key</a></li>
			            <li role="presentation"><a href="#delete-public-key">Delete Public Key</a></li>
			            <li role="presentation"><a href="#reset-public-key">Reset Public Key</a></li>
			            <li role="presentation"><a href="#persist-public-key">Persist Public Key</a></li>
			            <li role="presentation"><a href="#search-public-key">Search Public Key</a></li>
			            <li role="presentation"><a href="#create-user-data">Create User Data</a></li>
			            <li role="presentation"><a href="#delete-user-data">Delete User Data</a></li>
			            <li role="presentation"><a href="#resend-confirmation-user-data">Resend Confirmation User Data</a></li>
			            <li role="presentation"><a href="#error-codes">Error Codes</a></li>
					</ul>
			</div>
		</div>
	</div>
@show
