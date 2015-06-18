@section('title')
Virgil | Developers | C#/.NET | Keys Services
@show

@section('header-block')
    <div class="dev-header-container">
        <div class="container">
            <h1 class="text-left">Virgil Keys Service</h1>
            <h3 class="text-left">This describes the resources that make up the official Virgil Services API's.</h3>        
        </div>        
    </div>    
    @include('pages.public.documents.php.partial.header')
@show

@section('content')
<div class="dev">
	<div class="container">
		<div class="row">
			<div class="col-md-38 dev-content">
				<h2>Public Keys RESTful API</h2>
				<p>
					A public keys RESTful API allows users of the Internet and other public networks to engage in 
					secure communication, data exchange and money exchange. This is done through public and private cryptographic 
					key pairs provided by a virgil security crypto library.
				</p>
				<h2 id="accounts">Accounts</h2>
				<p>
				   An account is an used for managing Virgil Security public keys and user data. Each account can have one or more 
				   different public keys configured for several user identities.
				 </p>

				<h3>Create an Account</h3>
				<p>This endpoint allows you to register new account with predefined user identity and public key.</p>
				
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    POST
Request URL            https://pki.virgilsecurity.com/v1/public-key
x-virgil-app-token     Header with application access token, see <a href="/documents/csharp/quickstart#obtaining-an-app-token">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X POST https://pki.virgilsecurity.com/v1/public-key --data '{"public_key" : "BASE64-ENCODED-STRING", "guid": "a53e98e4-0197-4513-be6d-49836e406aaa"}'</code></pre>
				<h4>Permissions</h4>
				<p>An application access token is required to request for account creation.</p>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>public_key</td>
						<td>
							A public key is created with Crypto Library and converted to Base64 format. Please see more details 
							about public/private kay pair generation <a href="/documents/csharp/quickstart#generate-keys">here.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>class</td>
						<td>
							Represents a user data class, which can be <b>user_id</b> or <b>user_info</b>, see more information about 
							this parameter in <a href="#UserData">User Data</a> section.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>type</td>
						<td>Currently the API support only <b>email</b> type of user data, but it will be updated with more additional 
						types like phone, domain etc.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>value</td>
						<td>This is the value of user data</td>
						<td>string</td>
					</tr>
				</table>

				<h4>Request Body</h4>
				<pre><code class="langauge-json">{
  "public_key": "BASE64-ENCODED-STRING",
  "user_data": [                                              
    {
      "class": "user_id",
      "type": "email",
      "value": "user@virgilsecurity.com"
    }
  ]
  "guid": "a53e98e4-0197-4513-be6d-49836e406aaa"
}</code></pre>
				<h4>Response Body</h4>
				<pre><code class="langauge-json">{
    "id" : {
        "account_id": "3a768eea-cbda-4926-a82d-831cb89092aa",
        "public_key_id": "17084b40-08f5-4bcd-a739-c0d08c176bad"
    },
    "public_key": "BASE64-ENCODED-STRING",
    "user_data": []
}</code></pre>
				
				<h2 id="public-keys">Public Keys</h2>
				<p>
					Holds public key information for user's account and aggregates user identities related to this public key.
				</p>
				<h3>Create an Public Key</h3>
				<p>This endpoint allows you to add new public key with user data.</p>
				
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    POST
Request URL            https://pki.virgilsecurity.com/v1/public-key
x-virgil-app-token     Header with application access token, see <a href="/documents/csharp/quickstart#obtaining-an-app-token">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X POST https://pki.virgilsecurity.com/v1/public-key --data '{"public_key" : "BASE64-ENCODED-STRING", "guid": "a53e98e4-0197-4513-be6d-49836e406aaa"}'</code></pre>
				
				<h4>Permissions</h4>
				<p>An application access token is required to request for account creation.</p>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>account_id</td>
						<td>
							The account ID.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>public_key</td>
						<td>
							A public key is created with Crypto Library and converted to Base64 format. Please see more details 
							about public/private kay pair generation <a href="/documents/csharp/quickstart#generate-keys">here.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>class</td>
						<td>
							Represents a user data class, which can be <b>user_id</b> or <b>user_info</b>, see more information about 
							this parameter in <a href="#UserData">User Data</a> section.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>type</td>
						<td>Currently the API support only <b>email</b> type of user data, but it will be updated with more additional 
						types like phone, domain etc.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>value</td>
						<td>This is the value of user data</td>
						<td>string</td>
					</tr>
				</table>

				<h4>Request Body</h4>
				<pre><code class="langauge-json">{
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
}</code></pre>
				<h4>Response Body</h4>
				<pre><code class="langauge-json">{
    "id" : {
        "account_id": "3a768eea-cbda-4926-a82d-831cb89092aa",
        "public_key_id": "17084b40-08f5-4bcd-a739-c0d08c176bad"
    },
    "public_key": "BASE64-ENCODED-STRING",
    "user_data": []
}</code></pre>
				<h2>Get an Public Key</h2>
				<p>Retrieve the information on Public Key including all nested UserData items.</p>
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    GET
Request URL            https://pki.virgilsecurity.com/v1/public-key/{public-key-id}
x-virgil-app-token     Header with application access token, see <a href="/documents/csharp/quickstart#obtaining-an-app-token">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X GET https://pki.virgilsecurity.com/v1/public-key/6480ba7a-1b68-141e-b547-ef8d9adc3145</code></pre>
				
				<h4>Permissions</h4>
				<p>An application access token is required to request for account creation.</p>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>account_id</td>
						<td>
							The account ID.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>public_key_id</td>
						<td>
							The public key ID.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>public_key</td>
						<td>
							A public key is created with Crypto Library and converted to Base64 format. Please see more details 
							about public/private kay pair generation <a href="/documents/csharp/quickstart#generate-keys">here.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>class</td>
						<td>
							Represents a user data class, which can be <b>user_id</b> or <b>user_info</b>, see more information about 
							this parameter in <a href="#UserData">User Data</a> section.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>type</td>
						<td>Currently the API support only <b>email</b> type of user data, but it will be updated with more additional 
						types like phone, domain etc.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>value</td>
						<td>This is the value of user data</td>
						<td>string</td>
					</tr>
					<tr>
						<td>is_confirmed</td>
						<td>Indicates is the User Identity is enabled.</td>
						<td>string</td>
					</tr>
				</table>

				<h4>Response Body</h4>
				<pre><code class="langauge-json">{
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
}</code></pre>

				<h2 id="user-data">User Data</h2>
				<p>Validated user information pieces that use public key to encrypt the data. Available UserData class/type combinations are:</p>
				<p>User ID Examples:</p>
<pre><code class="html">{
    "class": "user_id",
    "type": "email",
    "value": "user@virgilsecurity.com"
}</code></pre>
<pre><code class="html">{
    "class": "user_id",
    "type": "domain",
    "value": "virgilsecurity.com"
}</code></pre>
				<p>User Info Examples:</p>
<pre><code class="html">{
    "class": "user_info",
    "type": "first_name"
    "value": "Bob"
}</code></pre>
<pre><code class="html">{
    "class": "user_info",
    "type": "last_name"
    "value": "Bobson"
}</code></pre>

				<h3>Add a User Data</h3>
				<p>This endpoint allows you to add new user data for virgil public key.</p>
				
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    POST
Request URL            https://pki.virgilsecurity.com/v1/user-data
x-virgil-app-token     Header with application access token, see <a href="/documents/csharp/quickstart#obtaining-an-app-token">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X POST https://pki.virgilsecurity.com/v1/user-data --data '{"public_key_id": "30a7e1b3-e763-4789-a54d-fcc53dcf973a", "class": "user_id", "type": "email", "value": "daniel.rehl@virgilsecurity.com", "guid": "a53e98e4-0197-4513-be6d-49836e406aaa"}'</code></pre>
				
				<h4>Permissions</h4>
				<p>An application access token is required to request for account creation.</p>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>public_key_id</td>
						<td>
							This is Virgil Public Key identifier.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>class</td>
						<td>
							Represents a user data class, which can be <b>user_id</b> or <b>user_info</b>.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>type</td>
						<td>This is user data type.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>value</td>
						<td>This is the value of user data</td>
						<td>string</td>
					</tr>
				</table>

				<h4>Request Body</h4>
				<pre><code class="langauge-json">{
   "public_key_id": "30a7e1b3-e763-4789-a54d-fcc53dcf973a",
   "class": "user_info",
   "type" : "last_name",
   "value": "Maley",
   "guid": "3a768eea-cbda-4926-a82d-831cb89092aa"
}</code></pre>
				<h4>Response Body</h4>
				<pre><code class="langauge-json">{
    "id": {
        "account_id": "3a768eea-cbda-4926-a82d-831cb89092aa",
        "public_key_id": "17084b40-08f5-4bcd-a739-c0d08c176bad",
        "user_data_id": "e33898de-6302-4756-8f0c-5f6c5218e02e"
    },
    "class": "user_id",
    "type": "email",
    "value": "daniel.rehl@vitgilsecurity.com"
}</code></pre>
				<h3>Get a User Data</h3>
				<p>This endpoint retrieves the information on UserData.</p>
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    GET
Request URL            https://pki.virgilsecurity.com/v1/user-data/{user-data-id}
x-virgil-app-token     Header with application access token, see <a href="/documents/csharp/quickstart#obtaining-an-app-token">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X GET https://pki.virgilsecurity.com/v1/user-data/6480ba7a-1b68-141e-b547-ef8d9adc3145</code></pre>
				
				<h4>Permissions</h4>
				<p>An application access token is required to request for account creation.</p>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>class</td>
						<td>
							Represents a user data class, which can be <b>user_id</b> or <b>user_info</b>, see more information about 
							this parameter in <a href="#UserData">User Data</a> section.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>type</td>
						<td>Currently the API support only <b>email</b> type of user data, but it will be updated with more additional 
						types like phone, domain etc.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>value</td>
						<td>This is the value of user data</td>
						<td>string</td>
					</tr>
				</table>

				<h4>Response Body</h4>
				<pre><code class="langauge-json">{
    "id": {
        "account_id": "e33898de-6302-4756-8f0c-5f6c5218e02e",
        "public_key_id": "30a7e1b3-e763-4789-a54d-fcc53dcf973a",
        "user_data_id": "cd171f7c-560d-4a62-8d65-16b87419a58c"
    },
    "class": "user_id",
    "type": "email",
    "value": "user@virgilsecurity.com"
}</code></pre>
				<h3>Сonfirm a User Data</h3>
				<p>This endpoint confirms UserData ownership by specifying the code received on registration.</p>
				
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    POST
Request URL            https://pki.virgilsecurity.com/v1/user-data/{user-data-id}/actions/confirm
x-virgil-app-token     Header with application access token, see <a href="/documents/csharp/quickstart#obtaining-an-app-token">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X POST https://pki.virgilsecurity.com/v1/user-data/6480ba7a-1b68-141e-b547-ef8d9adc3145/actions/confirm --data '{"guid": "a53e98e4-0197-4513-be6d-49836e406aaa", "code":"F9U0W9"}'</code></pre>
				
				<h4>Permissions</h4>
				<p>An application access token is required to request for account creation.</p>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>code</td>
						<td>
							This is confirmation code. The confirmation uses only for <b>user_id</b> classes.</td>
						<td>string</td>
					</tr>
				</table>

				<h4>Request Body</h4>
				<pre><code class="langauge-json">{
    "code": "F9U0W9",
    "guid": "a53e98e4-0197-4513-be6d-49836e406aaa"
}</code></pre>
				<h3>Resend a User Data confirmation </h3>
				<p>This endpoint resends the UserData's confirmation code</p>
				
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    POST
Request URL            https://pki.virgilsecurity.com/v1/user-data/{user-data-id}/actions/resend-confirmation
x-virgil-app-token     Header with application access token, see <a href="/documents/csharp/quickstart#obtaining-an-app-token">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X POST https://pki.virgilsecurity.com/v1/user-data/6480ba7a-1b68-141e-b547-ef8d9adc3145/actions/resend-confirmation --data '{"guid": "a53e98e4-0197-4513-be6d-49836e406aaa"}'</code></pre>
				
				<h4>Permissions</h4>
				<p>An application access token is required to request for account creation.</p>

				<h4>Request Body</h4>
				<pre><code class="langauge-json">{
    "guid": "a53e98e4-0197-4513-be6d-49836e406aaa"
}</code></pre>
				<h2 id="search">Search</h2>
				<p>The Search is optimized to help you find the specific item you’re looking for (e.g., a specific public key, a specific user data and etc.). </p>
				<h3>Search for Public Keys</h3>
				<p>Retrieve Account entity by user data specified.</p>
				
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    POST
Request URL            https://pki.virgilsecurity.com/v1/account/actions/search
x-virgil-app-token     Header with application access token, see <a href="/documents/csharp/quickstart#obtaining-an-app-token">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X POST https://pki.virgilsecurity.com/v1/account/actions/search --data '{"email": "test@test.com"}'</code></pre>
				
				<h4>Permissions</h4>
				<p>An application access token is required to request for account creation.</p>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>email</td>
						<td>
						 	The user data identity type.</td>
						<td>string</td>
					</tr>
				</table>

				<h4>Request Body</h4>
				<pre><code class="langauge-json">{
    "email": "test@test.com"
}</code></pre>
				<h4>Response Body</h4>
				<pre><code class="langauge-json">[
    {
        "id": {
            "account_id": "981d9537-3cc1-1236-6d63-8a7a608f572f",
        },
        "public_keys":[
            {
                "id":{
                    "account_id": "981d9537-3cc1-1236-6d63-8a7a608f572f",
                    "public_key_id": "75a152b8-022d-6137-3f1a-dc0353639fe8"
                },
                "public_key":"tkjvnerovgboiej9u5gj4b0best"
            }
        ]
    }
]</code></pre>
				<h3>Search for User Data</h3>
				<p>Retrieve UserData entity by value specified</p>
				
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    POST
Request URL            https://pki.virgilsecurity.com/v1/user-data/actions/search
x-virgil-app-token     Header with application access token, see <a href="/documents/csharp/quickstart#obtaining-an-app-token">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X POST https://pki.virgilsecurity.com/v1/user-data/actions/search\?expand\=public_key --data '{"email": "user@virgilsecurity.com"}'</code></pre>
				
				<h4>Permissions</h4>
				<p>An application access token is required to request for account creation.</p>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>email</td>
						<td>
						 	The user data identity type.</td>
						<td>string</td>
					</tr>
				</table>

				<h4>Request Body</h4>
				<pre><code class="langauge-json">{
    "email": "test@test.com"
}</code></pre>
				<h4>Response Body</h4>
				<pre><code class="langauge-json">[
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
]</code></pre>
				
				<h3 id="error-codes">Error Codes</h3>
				<p>Application uses standard HTTP response codes:</p>
				<table class="table">
					<tr>
						<th>Response&nbsp;Codes</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>200</td>
						<td>Success</td>
					</tr>					
					<tr>
						<td>400</td>
						<td>Request error</td>
					</tr>
					<tr>
						<td>401</td>
						<td>Authorization error</td>
					</tr>					
					<tr>
						<td>404</td>
						<td>Entity not found</td>
					</tr>
					<tr>
						<td>405</td>
						<td>Method not allowed</td>
					</tr>					
					<tr>
						<td>500</td>
						<td>Server error</td>
					</tr>
				</table>
				<p>Addititional information about the error is returned as JSON-object like:</p>
				<pre><code class="langauge-json">{
    "error": {
        "code": {error-code}
    }
}</code></pre>
				<p><b>HTTP 500. Server error</b> status is returned on internal application errors</p>
				<table class="table">
					<tr>
						<th>Error&nbsp;Codes</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>10000</td>
						<td>Internal application error</td>
					</tr>					
					<tr>
						<td>10001</td>
						<td>Application kernel error</td>
					</tr>
					<tr>
						<td>10010</td>
						<td>Internal application error</td>
					</tr>
					<tr>
						<td>10011</td>
						<td>Internal application error</td>
					</tr>
					<tr>
						<td>10012</td>
						<td>Internal application error</td>
					</tr>						
					<tr>
						<td>10100</td>
						<td>JSON specified as a request body is invalid</td>
					</tr>
				</table>

				<p><b>HTTP 401. Auth error</b> status is returned on authorization errors</p>
				<table class="table">
					<tr>
						<th>Error&nbsp;Codes</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>10200</td>
						<td>Guid specified is expired already</td>
					</tr>					
					<tr>
						<td>10201</td>
						<td>The Guid specified is invalid</td>
					</tr>
					<tr>
						<td>10202</td>
						<td>The Authorization header was not specified</td>
					</tr>
					<tr>
						<td>10203</td>
						<td>Public key header not specified or incorrect</td>
					</tr>
					<tr>
						<td>10204</td>
						<td>The signed digest specified is incorrect</td>
					</tr>
				</table>

				<p><b>HTTP 400. Request error</b> status is returned on request data validation errors</p>
				<table class="table">
					<tr>
						<th>Error&nbsp;Codes</th>
						<th>Description</th>
					</tr>
					<tr><td>20000</td>
						<td>Account object not found for id specified</td>
					</tr>					
					<tr><td>20100</td>
						<td>Public key object not found for id specified</td>
					</tr>
					<tr><td>20101</td>
						<td>Public key invalid</td>
					</tr>
					<tr><td>20102</td>
						<td>Public key not specified</td>
					</tr>
					<tr><td>20103</td>
						<td>Public key must be base64-encoded string</td>
					</tr>
					<tr><td>20200<td>UserData object not found for id specified
					<tr><td>20201<td>UserData type specified is invalid
					<tr><td>20202<td>UserData type specified for user identity is invalid
					<tr><td>20203<td>Domain specified for domain identity is invalid
					<tr><td>20204<td>Email specified for email identity is invalid
					<tr><td>20205<td>Phone specified for phone identity is invalid
					<tr><td>20206<td>Fax specified for fax identity is invalid
					<tr><td>20207<td>Application specified for application identity is invalid
					<tr><td>20208<td>Mac address specified for mac address identity is invalid
					<tr><td>20210<td>UserData integrity constraint violation
					<tr><td>20211<td>UserData confirmation entity not found by code specified
					<tr><td>20212<td>UserData confirmation code invalid
					<tr><td>20213<td>UserData was already confirmed and does not need further confirmation
					<tr><td>20214<td>UserData class specified is invalid
					<tr><td>20300<td>User info data validation failed. Name is invalid
				</table>
				<h2>Private Keys RESTful API</h2>
				<p>RESTful service for private keys managing</p>
				<h2 id="authentication">Authentication</h2>
				<p>
					Service will create Authentication token that will be available during the 60 minutes after creation. During this time service will
				 	automatically prolong life time of the token in case if Authentication token widely used so don't need to prolong it manually. 
				 	In case when Authentication token is used after 60 minutes of life time, service will throw the appropriate error.
				</p>
				
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    POST
Request URL            http://keyring.virgilsecurity.com/v1/authentication/get-token
x-auth-token           Not required</code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X GET http://keyring.virgilsecurity.com/v1/authentication/get-token</code></pre>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>password</td>
						<td>
							The account password.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>class</td>
						<td>
							Represents a user data class, which can be <b>user_id</b> or <b>user_info</b>.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>type</td>
						<td>This is user data type.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>value</td>
						<td>This is the value of user data</td>
						<td>string</td>
					</tr>
					<tr>
						<td>auth_token</td>
						<td>This is the value of user data</td>
						<td>string</td>
					</tr>
				</table>

				<h4>Request Body</h4>
				<pre><code class="langauge-json">{
    "password": "password",
    "user_data": {
        "class": "user_id",
        "type": "email",
        "value": "mail@gmail.com"
    }
}</code></pre>
				<h4>Response Body</h4>
				<pre><code class="langauge-json">{
    "auth_token": "dbbbe6a906aa4d567531827beb66a2aadbbbe6a906aa4d567531827beb66a2aa"
}</code></pre>

				<h2 id="private-keys">Private Keys</h2>
				<p>
					Private Key entity endpoints
				</p>
				<h3>Get an Private Key</h3>
				<p>Retrieve Private Key information for requested account.</p>
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    GET
Request URL            http://keyring.virgilsecurity.com/v1/private-key/account/{account-id}
x-auth-token           Required, see <a href="#authentication">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X GET http://keyring.virgilsecurity.com/v1/private-key/account/6480ba7a-1b68-141e-b547-ef8d9adc3145</code></pre>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>account_id</td>
						<td>This parameter identifies the ID of user account in the Public Keys Service. 
							(see more details about Accounts of Public Keys API <a href="/documents/csharp/keys-service#accounts">here...</a>).</td>
						<td>string</td>
					</tr>
					<tr>
						<td>account_type</td>
						<td>
							Represents an account type, which can be <b>easy</b> and <b>normal</b>.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>public_key_id</td>
						<td>This parameter represents the ID of Virgil Public Key in Keys service (see more details about Public Keys API 
						    <a href="/documents/csharp/keys-service#public-keys">here...</a>).</td>
						<td>string</td>
					</tr>
					<tr>
						<td>private_key</td>
						<td>This parameter represents the private key in base64 format. Attention: if you use "normal" 
						    account type, you need to decrypt this it with password it was encrypted.</td>
						<td>string</td>
					</tr>
				</table>
				<h4>Response Body</h4>
				<pre><code class="langauge-json">{
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
}</code></pre>
				<h3>Get an Private Key by Public Key Id</h3>
				<p>Get Private Key data by public key.</p>
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    GET
Request URL            http://keyring.virgilsecurity.com/v1/private-key/public-key-id/{public-key-id}
x-auth-token           Required, see <a href="#authentication">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X GET http://keyring.virgilsecurity.com/v1/private-key/public-key-id/6480ba7a-1b68-141e-b547-ef8d9adc3145</code></pre>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>account_id</td>
						<td>This parameter identifies the ID of user account in the Public Keys Service. 
							(see more details about Accounts of Public Keys API <a href="/documents/csharp/keys-service#accounts">here...</a>).</td>
						<td>string</td>
					</tr>
					<tr>
						<td>public_key_id</td>
						<td>This parameter represents the ID of Virgil Public Key in Keys service (see more details about Public Keys API 
						    <a href="/documents/csharp/keys-service#public-keys">here...</a>).</td>
						<td>string</td>
					</tr>
					<tr>
						<td>private_key</td>
						<td>This parameter represents the private key in base64 format. Attention: if you use "normal" 
						    account type, you need to decrypt this it with password it was encrypted.</td>
						<td>string</td>
					</tr>
				</table>
				<h4>Response Body</h4>
				<pre><code class="langauge-json">{
    "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
    "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
    "private_key": "BASE64-ENCODED-STRING"
}</code></pre>
				<h3>Add Private Key</h3>
				<p>Store Private Key</p>
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    POST
Request URL            http://keyring.virgilsecurity.com/v1/private-key
x-auth-token           Required, see <a href="#authentication">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X POST http://keyring.virgilsecurity.com/v1/private-key -data {"account_id": "6F9619FF-8B86-D011-B42D-00CF4FC964F1","public_key_id": "6F34195F-9A86-B022-B65D-22CF4FC456F1","key": "BASE64-ENCODED-STRING", "sign": "BASE64-ENCODED-STRING"}</code></pre>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>account_id</td>
						<td>This parameter identifies the ID of user account in the Public Keys Service. 
							(see more details about Accounts of Public Keys API <a href="/documents/csharp/keys-service#accounts">here...</a>).</td>
						<td>string</td>
					</tr>
					<tr>
						<td>public_key_id</td>
						<td>This parameter represents the ID of Virgil Public Key in Keys service (see more details about Public Keys API 
						    <a href="/documents/csharp/keys-service#public-keys">here...</a>).</td>
						<td>string</td>
					</tr>
					<tr>
						<td>sign</td>
						<td>This parameter contains digital signature of public key ID in base64 format. This signature confirmas that the client has a private key.
							(see more details about siging data <a href="/documents/csharp/quickstart#sign-data">here...</a> )
						    To pass this parameter sign the public key ID using Crypto Library and convert the result to base64 format.</a></td>
						<td>string</td>
					</tr>
					<tr>
						<td>private_key</td>
						<td>This parameter represents the private key in base64 format. Attention: if you use "normal" 
						    account type, the private key should be encrypted with additional password on the client 
						    side and passed encrypted as well in base64 format.</td>
						<td>string</td>
					</tr>
				</table>
				<h4>Requiest Body</h4>
				<pre><code class="langauge-json">{
    "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
    "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
    "sign": "BASE64-ENCODED-STRING",
    "private_key": "BASE64-ENCODED-STRING"
}</code></pre>
<h4>Response Body</h4>
				<pre><code class="langauge-json">{
    "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
    "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
    "private_key": "BASE64-ENCODED-STRING"
}</code></pre>
				<h3>Delete Private Key</h3>
				<p>Delete Private Key from service storage by public key ID</p>
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    DELETE
Request URL            http://keyring.virgilsecurity.com/v1/private-key
x-auth-token           Required, see <a href="#authentication">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X DELETE http://keyring.virgilsecurity.com/v1/private-key --data '{"public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633", "digest": "BASE64-ENCODED-STRING"}'</code></pre>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>public_key_id</td>
						<td>This parameter represents the ID of Virgil Public Key in Keys service (see more details about Public Keys API 
						    <a href="/documents/csharp/keys-service#public-keys">here...</a>).</td>
						<td>string</td>
					</tr>
					<tr>
						<td>sign</td>
						<td>This parameter contains digital signature of public key ID in base64 format. This signature confirmas that the client has a private key.
							(see more details about siging data <a href="/documents/csharp/quickstart#sign-data">here...</a> )
						    To pass this parameter sign the public key ID using Crypto Library and convert the result to base64 format.</a></td>
						<td>string</td>
					</tr>
				</table>
				<h4>Requiest Body</h4>
				<pre><code class="langauge-json">{
    "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
    "sign": "BASE64-ENCODED-STRING"
}</code></pre>
				<h2 id="private-accounts">Accounts</h2>
				<p>Account entity endpoints</p>
				<h3>Create an Account</h3>
				<p>Store Private Key</p>
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    POST
Request URL            http://keyring.virgilsecurity.com/v1/account
x-auth-token           Required, see <a href="#authentication">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X POST http://keyring.virgilsecurity.com/v1/account --data '{"account_id": "6F9619FF-8B86-D011-B42D-00CF4FC964F1", "account_type":"normal", "password": "password", "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633", "sign": "BASE64-ENCODED-STRING"}'</code></pre>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>account_id</td>
						<td>This parameter identifies the ID of user account in the Public Keys Service. 
							(see more details about Accounts of Public Keys API <a href="/documents/csharp/keys-service#accounts">here...</a>).</td>
						<td>string</td>
					</tr>	
					<tr>
						<td>account_type</td>
						<td>Represents an account type, which can be easy and normal.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>public_key_id</td>
						<td>This parameter represents the ID of Virgil Public Key in Keys service (see more details about Public Keys API 
						    <a href="/documents/csharp/keys-service#public-keys">here...</a>).</td>
						<td>string</td>
					</tr>
					<tr>
						<td>sign</td>
						<td>This parameter contains digital signature of public key ID in base64 format. This signature confirmas that the client has a private key.
							(see more details about siging data <a href="/documents/csharp/quickstart#sign-data">here...</a> )
						    To pass this parameter sign the public key ID using Crypto Library and convert the result to base64 format.</a></td>
						<td>string</td>
					</tr>
				</table>
				<h4>Requiest Body</h4>
				<p>Example 1: Create an easy account, all private keys encrypted with account password.</p>
				<pre><code class="langauge-json">{
    "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
    "account_type": "easy",
    "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
    "sign": "BASE64-ENCODED-STRING",
    "password": "password"
}</code></pre>
				<p>Example 2: Create a normal account, all private keys encrypted on the client side and server can't decrypt them.</p>
				<pre><code class="langauge-json">{
    "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
    "account_type": "normal",
    "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
    "sign": "BASE64-ENCODED-STRING",
    "password": "password",
}</code></pre>
<h4>Response Body</h4>
				<pre><code class="langauge-json">{
    "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
}</code></pre>

				<!-- <h3>Update an Account</h3>
				<p>Update account information</p>
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    PUT
Request URL            http://keyring.virgilsecurity.com/v1/account
x-auth-token           Required, see <a href="#authentication">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X PUT http://keyring.virgilsecurity.com/v1/account --data '{"account_id": "6F9619FF-8B86-D011-B42D-00CF4FC964F1", "account_type":"normal", "password": "password", "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633", "sign": "BASE64-ENCODED-STRING"}'</code></pre>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>account_id</td>
						<td>The Public Keys Service account identifier.</td>
						<td>string</td>
					</tr>	
					<tr>
						<td>account_type</td>
						<td>Represents an account type, which can be easy and normal.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>public_key_id</td>
						<td>This is the Public Key identifier</td>
						<td>string</td>
					</tr>
					<tr>
						<td>sign</td>
						<td>Signed public key ID in base64 format.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>password</td>
						<td>encrypted private key</td>
						<td>string</td>
					</tr>
				</table>
				<h4>Requiest Body</h4>
				<p>Example 1: Create an easy account, all private keys encrypted with account password.</p>
				<pre><code class="langauge-json">{
    "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
    "account_type": "easy",
    "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
    "sign": "BASE64-ENCODED-STRING",
    "password": "password"
}</code></pre>
				<p>Example 2: Create a normal account, all private keys encrypted on the client side and server can't decrypt them.</p>
				<pre><code class="langauge-json">{
    "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
    "account_type": "normal",
    "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
    "sign": "BASE64-ENCODED-STRING",
    "password": "password",
}</code></pre>
<h4>Response Body</h4>
				<pre><code class="langauge-json">{
    "account_id": "73d2288c-7c50-08d0-3526-4be366afef2a",
}</code></pre> -->

				<h3>Reset Password</h3>
				<p>Resets password</p>
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    PUT
Request URL            http://keyring.virgilsecurity.com/v1/account/reset
x-auth-token           Required, see <a href="#authentication">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X PUT http://keyring.virgilsecurity.com/v1/account/reset --data '{"user_data": {"class": "user_id", "type": "email", "value": "user_name@gmail.com"}, "password": "new_password"}'</code></pre>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>class</td>
						<td>Represents a user data class, which can be <b>user_id</b> or <b>user_info</b>.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>type</td>
						<td>This is user data type.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>value</td>
						<td>This is the value of user data</td>
						<td>string</td>
					</tr>
					<tr>
						<td>new_password</td>
						<td>New password</td>
						<td>string</td>
					</tr>	
				</table>
				<h4>Requiest Body</h4>
				<pre><code class="langauge-json">{
    "user_data": {
        "class": "user_id",
        "type": "email",
        "value": "mail@gmail.com"
    },
    "new_password": "new_password"
}</code></pre>
                <h3>Verify Account change Password</h3>
				<p>Resets password</p>
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    PUT
Request URL            http://keyring.virgilsecurity.com/v1/account/reset
x-auth-token           Required, see <a href="#authentication">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X PUT http://keyring.virgilsecurity.com/v1/account/reset --data '{"user_data": {"class": "user_id", "type": "email", "value": "user_name@gmail.com"}, "password": "new_password"}'</code></pre>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>class</td>
						<td>Represents a user data class, which can be <b>user_id</b> or <b>user_info</b>.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>type</td>
						<td>This is user data type.</td>
						<td>string</td>
					</tr>
					<tr>
						<td>value</td>
						<td>This is the value of user data</td>
						<td>string</td>
					</tr>
					<tr>
						<td>new_password</td>
						<td>New password</td>
						<td>string</td>
					</tr>	
				</table>
				<h4>Requiest Body</h4>
				<pre><code class="langauge-json">{
    "user_data": {
        "class": "user_id",
        "type": "email",
        "value": "mail@gmail.com"
    },
    "new_password": "new_password"
}</code></pre>
                <h3>Delete Account</h3>
				<p>Deletes accoount and all keys from service.</p>
				<h4>Request Info</h4>
				<pre><code class="html">HTTP Request method    DELETE
Request URL            http://keyring.virgilsecurity.com/v1/account
x-auth-token           Required, see <a href="#authentication">details.</a></code></pre>
				<h4>cURL Example</h4>
				<pre><code class="html">curl -v -X DELETE http://keyring.virgilsecurity.com/v1/account --data '{"account_id": "6480ba7a-1b68-141e-b547-ef8d9adc3145", "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633", "sign": "BASE64-ENCODED-STRING"}'</code></pre>
				
				<h4>Fields</h4>
				<table class="table">
					<tr>
						<th>Field&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>account_id</td>
						<td>This parameter identifies the ID of user account in the Public Keys Service. 
							(see more details about Accounts of Public Keys API <a href="/documents/csharp/keys-service#accounts">here...</a>).</td>
						<td>string</td>
					</tr>	
					<tr>
						<td>public_key_id</td>
						<td>This parameter represents the ID of Virgil Public Key in Keys service (see more details about Public Keys API 
						    <a href="/documents/csharp/keys-service#public-keys">here...</a>).</td>
						<td>string</td>
					</tr>
					<tr>
						<td>sign</td>
						<td>This parameter contains digital signature of public key ID in base64 format. This signature confirmas that the client has a private key.
							(see more details about siging data <a href="/documents/csharp/quickstart#sign-data">here...</a> )
						    To pass this parameter sign the public key ID using Crypto Library and convert the result to base64 format.</a></td>
						<td>string</td>
					</tr>
				</table>
				<h4>Requiest Body</h4>
				<pre><code class="langauge-json">{
    "account_id": "6480ba7a-1b68-141e-b547-ef8d9adc3145",
    "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
    "sign": "BASE64-ENCODED-STRING"
}</code></pre>
<h3 id="private-error-codes">Error Codes</h3>
				<p>Application uses standard HTTP response codes:</p>
				<table class="table">
					<tr>
						<th>Response&nbsp;Codes</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>200</td>
						<td>Success</td>
					</tr>					
					<tr>
						<td>400</td>
						<td>Request error</td>
					</tr>
					<tr>
						<td>401</td>
						<td>Authorization error</td>
					</tr>					
					<tr>
						<td>500</td>
						<td>Server error</td>
					</tr>
				</table>
				<p>Addititional information about the error is returned as JSON-object like:</p>
				<pre><code class="langauge-json">{
    "error": {
        "code": {error-code}
    }
}</code></pre>
				<p><b>HTTP 500. Server error</b> status is returned on internal application errors</p>
				<table class="table">
					<tr>
						<th>Error&nbsp;Codes</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>10001</td>
						<td>Internal application error. Route was not found.</td>
					</tr>
					<tr>
						<td>10002</td>
						<td>Internal application error. Route not allowed.</td>
					</tr>
				</table>

				<p><b>HTTP 400. Request error</b> status is returned on request data validation errors</p>
				<table class="table">
					<tr>
						<th>Error&nbsp;Codes</th>
						<th>Description</th>
					</tr>
                    <tr><td>20001<td>Athentication password validation failed
                    <tr><td>20002<td>Athentication user data validation failed
                    <tr><td>20003<td>Athentication account was not found by provided user data
                    <tr><td>20004<td>Athentication token validation failed
                    <tr><td>20005<td>Athentication token not found
                    <tr><td>20006<td>Athentication token has expired
                    <tr><td>30001<td>Signed validation failed
                    <tr><td>40001<td>Account validation failed
                    <tr><td>40002<td>Account was not found
                    <tr><td>40003<td>Account already exists
                    <tr><td>40004<td>Account password was not specified
                    <tr><td>40005<td>Account password validation failed
                    <tr><td>40006<td>Account was not found in PKI service
                    <tr><td>40007<td>Account type validation failed
                    <tr><td>50001<td>Public Key validation failed
                    <tr><td>50002<td>Public Key was not found
                    <tr><td>50003<td>Public Key already exists
                    <tr><td>50004<td>Public Key private key validation failed
                    <tr><td>50005<td>Public Key private key base64 validation failed
                    <tr><td>60001<td>Token was not found in request
                    <tr><td>60002<td>User Data validation failed
                    <tr><td>60003<td>Account was not found by user data
                    <tr><td>60004<td>Verification token ash expired
				</table>
			</div>
			<div class="col-md-10">
					<ul class="nav nav-pills nav-stacked dev-affix">
			            <li class="title" role="presentation">Public Keys RESTful API</li>
			            <li role="presentation"><a href="#accounts">Accounts</a></li>
			            <li role="presentation"><a href="#public-keys">Public Keys</a></li>
			            <li role="presentation"><a href="#user-data">User Data</a></li>
			            <li role="presentation"><a href="#signs">Signs</a></li>
			            <li role="presentation"><a href="#search">Search</a></li>
			            <li role="presentation"><a href="#error-codes">Error Codes</a></li>
			            <li class="title" role="presentation">Private Keys RESTful API</li>
			            <li role="presentation"><a href="#authentication">Authentication</a></li>
			            <li role="presentation"><a href="#private-keys">Private Keys</a></li>
			            <li role="presentation"><a href="#private-accounts">Accounts</a></li>
			            <li role="presentation"><a href="#private-error-codes">Error Codes</a></li>
					</ul>
			</div>
		</div>
	</div>
</div>
@stop
