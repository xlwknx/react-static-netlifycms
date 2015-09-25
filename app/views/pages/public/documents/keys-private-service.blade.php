@section('keys-private-docs')
	<div class="container">
		<div class="row">
			<div class="col-md-9">

				<h2>Private Keys RESTful API</h2>
				<p>
					Properly securing private keys is crucial to public crypto systems, and must be implemented correctly.  
					If someone gains access to a user's private keys, they can use them to impersonate the rightful owner in any 
					communication or transaction on intranets and the Internet.  It can’t be stated more firmly that 
					private keys must only be in the possession of authorized users and must be protected from unauthorized use.
				</p>
				<p>
					Virgil Security provides secure RESTful API for store client's private keys.
				</p>

				<!-- AUTHENTICATION ===============================================================-->

				<h2 id="auth">Authenticate a Session</h2>

				<p>
					Virgil’s Service will create an Authentication token that will be available for 60 minutes. 
					If you work longer than 60 minutes, the token will automatically prolong itself.  Otherwise, 
					the token will die and you will need to generate a new one.
				</p>

				<blockquote class="danger">
                    Note:
                    <footer>
                    	Before logging in, make sure that you have already initialized the <a href="#init-container">Container 
                    	</a> in Virgil's Private Key service. Use the same confirmed <b>User Data</b> identity parameter as you 
                    	<a href="">registered in our Public Keys service</a>. 
                    </footer>
                </blockquote>

				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<th>Request&nbsp;Info</th>
						<th>Value</th>
					</tr>
					<tr>
						<td>HTTP Request method</td>
						<td>POST</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px" >Request URL</td>
						<td>https://keys-private.virgilsecurity.com/v2/authentication/get-token</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px">X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
							The application token header is mandatory in all app requests in order to access the public 
							and private keys service in your app. <a href="keys-service#application-token">See more details...</a>
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th style="white-space: nowrap;width: 210px">Parameter&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>user_data</td>
						<td>represents the user data identity</td>
						<td>string</td>
					</tr>
					<tr>
						<td>password</td>
						<td>the password set on <a href="#init-container">initializing the container</a></td>
						<td>string</td>
					</tr>
				</table>
									
				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{
  "password": "password",
  "user_data": {
    "class": "user_id",
    "type": "email",
    "value": "mail@gmail.com"
  }
}</code></pre>

				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">{
  "auth_token": "dbbbe6a906aa4d567531827beb66a2aadbbbe6a906aa4d567531827beb66a2aa",
}</code></pre>


				<!-- CONTAINER INITIALIZATION =====================================================-->

				<h2 id="init-container">Container Initialization</h2>
				<p>
				   <b>Virgil’s</b> Private Key storage provides users the container for private keys. 
				   Every user in the public key service will have a container for storing their private keys.
				</p>

				<p>You can define the container-type in two ways: </p>

                <p><b>EASY</b></p>
                <p>
                	If you define the container-type as “easy”, Virgil’s Keys Service will store the association 
                	between keys and Virgil would be able to recover the private keys for you if container password 
                	is forgotten.
                </p>

				<p><b>NORMAL</b></p>
				<p>
					If the user decides to define the container-type as “normal", the user is responsible for 
					the security of the container. Virgil’s service will accept the private keys whether they 
					are encrypted or not encrypted.
				</p>

				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<th>Request&nbsp;Info</th>
						<th>Value</th>
					</tr>
					<tr>
						<td>HTTP Request method</td>
						<td>POST</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px" >Request URL</td>
						<td>https://keys-private.virgilsecurity.com/v2/container</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
							The application token header is mandatory in all app requests in order to access the public 
							and private keys service in your app. <a href="keys-service#application-token">See more details...</a>
						</td>
					</tr>
					<tr>
						<td>X-VIRGIL-REQUEST-SIGN</td>
						<td>
							Represents the digital signature (in base64 encoded format) of the request body created by 
							the user’s private key using Virgil’s Crypto Library.
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px">X-VIRGIL-REQUEST-SIGN-PK-ID</td>
						<td>
							The ID represents the public key on Virgil’s Public Keys service and is used to verify 
							the signature in the X-VIRGIL-REQUEST-SIGN header.
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th style="white-space: nowrap;width: 210px">Parameter&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>container_type</td>
						<td>
							The container type can be defined as “normal” or “easy”. Using “easy” it is simple to reset 
							the user’s Private Key password using our service.  Using “normal” it is mandatory to 
							understand the consequences of forgetting a Private Key password. <a href="#init-container">See more details..</a></td>
						<td>string</td>
					</tr>
					<tr>
						<td>password</td>
						<td>
							represents the password of the container
						</td>
						<td>string</td>
					</tr>
					<tr>
						<td>request_sign_uuid</td>
						<td>
							request parameter that holds a random uuid to guarantee the uniqueness of the request body. 
						</td>
						<td>uuid</td>
					</tr>
				</table>

				<h4>Request Data Example (Easy)</h4>
				<p>
					Initializes an easy private keys container, all private keys encrypted with account 
					password, and server can decrypt them in case you forget container password.
				</p>
				<pre><code class="langauge-json">{
  "container_type": "easy",
  "password": "password",
  "request_sign_uuid": "57e0a766-28ef-355e-7ca2-d8a2dcf23fc4"
}</code></pre>
				<h4>Request Data Example (Normal)</h4>
				<p>
					Initializes a normal private keys container, all private keys encrypted on the client 
					side and server can't decrypt them.
				</p>
				<pre><code class="langauge-json">{
  "container_type": "normal",
  "password": "password",
  "request_sign_uuid": "57e0a766-28ef-355e-7ca2-d8a2dcf23fc4"
}</code></pre>
				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">No response body</code></pre>

				<!-- GET CONTAINER DETAILS ===========================================================-->

				<h2 id="get-container">Get Container Details</h2>

				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<th>Request&nbsp;Info</th>
						<th>Value</th>
					</tr>
					<tr>
						<td>HTTP Request method</td>
						<td>GET</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px" >Request URL</td>
						<td>https://keys-private.virgilsecurity.com/v2/container/public-key-id/{public-key-id}</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
							The application token header is mandatory in all app requests in order to access the public 
							and private keys service in your app. <a href="keys-service#application-token">See more details...</a>
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px">X-VIRGIL-AUTHENTICATION</td>
						<td>
							Authentication session token, received on 
							<a href="#auth">authentication</a> endpoint.
						</td>
					</tr>
				</table>
									
				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">No requiest body</code></pre>

				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">{
  "container_type": "easy"
}</code></pre>

				<!-- UPDATE CONTAINER ====================================================================-->

				<h2 id="update-container">Update Container</h2>

				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<th>Request&nbsp;Info</th>
						<th>Value</th>
					</tr>
					<tr>
						<td>HTTP Request method</td>
						<td>PUT</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px" >Request URL</td>
						<td>https://keys-private.virgilsecurity.com/v2/container</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
							The application token header is mandatory in all app requests in order to access the public 
							and private keys service in your app. <a href="keys-service#application-token">See more details...</a>
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px">X-VIRGIL-AUTHENTICATION</td>
						<td>
							Authentication session token, received on <a href="#auth">authentication</a> 
							endpoint.
						</td>
					</tr>
					<tr>
						<td>X-VIRGIL-REQUEST-SIGN</td>
						<td>
							Represents the digital signature (in base64 encoded format) of the request body created by 
							the user’s private key using Virgil’s Crypto Library.
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px">X-VIRGIL-REQUEST-SIGN-PK-ID</td>
						<td>
							The ID represents the public key on Virgil’s Public Keys service and is used to verify 
							the signature in the X-VIRGIL-REQUEST-SIGN header.
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th style="white-space: nowrap;width: 210px">Parameter&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>container_type</td>
						<td>
							The container type can be defined as “normal” or “easy”. </a>
						</td>
						<td>string</td>
					</tr>
					<tr>
						<td>password</td>
						<td>represents new container password</td>
						<td>string</td>
					</tr>
					<tr>
						<td>request_sign_uuid</td>
						<td>request parameter that holds random uuid to guarantee the uniqueness of the request body.</td>
						<td>uuid</td>
					</tr>
					
				</table>
									
				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{
  "container_type": "normal",
  "password": "password",
  "request_sign_uuid": "57e0a766-28ef-355e-7ca2-d8a2dcf23fc4"
}</code></pre>

				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">No response body</code></pre>


				<!-- RESET CONTAINER PASSWORD ==========================================================-->

				<h2 id="reset-container">Reset Container Password</h2>

				<blockquote class="danger">
                    Note:
                    <footer>
                        use <span class="label label-default">user_data.value</span> for this request parameter the same value as you have 
                        registered under Public Keys service. This account has to be confirmed under 
                        Public Key service.
                    </footer>
                </blockquote>

				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<th>Request&nbsp;Info</th>
						<th>Value</th>
					</tr>
					<tr>
						<td>HTTP Request method</td>
						<td>PUT</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px" >Request URL</td>
						<td>https://keys-private.virgilsecurity.com/v2/container/actions/reset-password</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
							The application token header is mandatory in all app requests in order to access the public 
							and private keys service in your app. <a href="keys-service#application-token">See more details...</a>
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th style="white-space: nowrap;width: 210px">Parameter&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>user_data</td>
						<td>The user data item of the public key</td>
						<td>string</td>
					</tr>
					<tr>
						<td>new_password</td>
						<td>Represents new container password</td>
						<td>object</td>
					</tr>
				</table>
									
				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{
  "user_data": {
    "class": "user_id",
    "type": "email",
    "value": "your.email@server.hz"
  },
  "new_password": "new_password"
}</code></pre>

				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">No response body</code></pre>

				<!-- PERSIST CONTAINER CHANGES ==========================================================-->

				<h2 id="persist-container">Persist Container Changes</h2>

				<p>Confirm password token and re-encrypt Private Key data with the new password.</p>

				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<th>Request&nbsp;Info</th>
						<th>Value</th>
					</tr>
					<tr>
						<td>HTTP Request method</td>
						<td>POST</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px" >Request URL</td>
						<td>https://keys-private.virgilsecurity.com/v2/container/actions/persist</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px" >X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
							Application token. This header is mandatory for all the requests to 
							distinguish keep tracking different applications requests.
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th style="white-space: nowrap;width: 210px">Parameter&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>token</td>
						<td>Confirmation token received on email box.</td>
						<td>string</td>						
					</tr>
					<tr>
						<td>request_sign_uuid</td>
						<td>Random UUID to guarantee the uniqueness of the request body</td>
						<td>uuid</td>
					</tr>
				</table>
									
				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{
  "token": "f2d6ed7d3509295265c6e4e37e141db0"
}</code></pre>

				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">No response body</code></pre>

				<!-- DELETE CONTAINER  ==============================================================-->

				<h2 id="delete-container">Delete Container</h2>

				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<th>Request&nbsp;Info</th>
						<th>Value</th>
					</tr>
					<tr>
						<td>HTTP Request method</td>
						<td>DELETE</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px" >Request URL</td>
						<td>https://keys-private.virgilsecurity.com/v2/container</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
							The application token header is mandatory in all app requests in order to access the public 
							and private keys service in your app. <a href="keys-service#application-token">See more details...</a>
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px">X-VIRGIL-AUTHENTICATION</td>
						<td>
							Authentication session token, received on <a href="#auth">authentication</a> 
							endpoint.
						</td>
					</tr>
					<tr>
						<td>X-VIRGIL-REQUEST-SIGN</td>
						<td>
							Represents the digital signature (in base64 encoded format) of the request body created by 
							the user’s private key using Virgil’s Crypto Library.
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px">X-VIRGIL-REQUEST-SIGN-PK-ID</td>
						<td>
							The ID represents the public key on Virgil’s Public Keys service and is used to verify 
							the signature in the X-VIRGIL-REQUEST-SIGN header.
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th style="white-space: nowrap;width: 210px">Parameter&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>request_sign_uuid</td>
						<td>Random UUID to guarantee the uniqueness of the request body</td>
						<td>uuid</td>
					</tr>
				</table>
									
				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{
  "request_sign_uuid":"57e0a766-28ef-355e-7ca2-d8a2dcf23fc4"
}</code></pre>

				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">No response body</code></pre>

				<!-- PUSH PRIVATE KEY  ==============================================================-->

				<h2 id="add-private-key">Push Private Key to Container</h2>

				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<th>Request&nbsp;Info</th>
						<th>Value</th>
					</tr>
					<tr>
						<td>HTTP Request method</td>
						<td>POST</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px" >Request URL</td>
						<td>https://keys-private.virgilsecurity.com/v2/private-key</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
							The application token header is mandatory in all app requests in order to access the public 
							and private keys service in your app. <a href="keys-service#application-token">See more details...</a>
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px">X-VIRGIL-AUTHENTICATION</td>
						<td>
							Authentication session token, received on <a href="#auth">authentication</a> 
							endpoint.
						</td>
					</tr>
					<tr>
						<td>X-VIRGIL-REQUEST-SIGN</td>
						<td>
							Represents the digital signature (in base64 encoded format) of the request body created by 
							the user’s private key using Virgil’s Crypto Library.
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px">X-VIRGIL-REQUEST-SIGN-PK-ID</td>
						<td>
							The ID represents the public key on Virgil’s Public Keys service and is used to verify 
							the signature in the X-VIRGIL-REQUEST-SIGN header.
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th style="white-space: nowrap;width: 210px">Parameter&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>request_sign_uuid</td>
						<td>Request parameter that holds random uuid to guarantee the uniqueness of the request body.</td>
						<td>uuid</td>
					</tr>
				</table>
									
				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{
  "private_key": 
    "MIGfAgEAMIGZBgkqhkiG9w0BBwOggYswgYgCAQMxV6NVMFMCAQAwJAYKKoZIhvcNAQwBAzAWBBDU07
     fg99wLPa36lr1V1ewoAgIIAAQo5rZc2/3cfpNqeHjEzphtoGBriaZ05yL/sEX2WKYkaBKMBSnjrSZ1
     /TAqBgkqhkiG9w0BBwEwHQYJYIZIAWUDBAEqBBDkjdlyM+456Z+z0P4TWpwwnMdJKqvCZELINhj1zC
     rqzjstrTH0aaQTKQsoaDsRU3gPc7fwkwFz66wPrbApOedvOOFyGZeuAySJE7+O3odRbECUSQ/bNwiu
     fy6T4IOflnhJb6ur/aptl9H3MOCFtTqpfma4sHXMgvTCTXB98OdOEZ4YZr5MjJBlEJVLaqCrs96wDx
     TkBgFZS7jrVOMqmTS0Vd4DiliYv+hyETpvoogKmItMUdKuzT/CqaIbVrY/h3J7FgVif7X8CHH9pn00
     57RhyAySMzibibHsMTlFG6XRWEbKCEVUIj4zowleNMiIqvhB1CUaGRn4vLssftCmgWITjYqoQodDJ8
     Lezdx+beoCdfm7Z8XNsAWAlrizbuanJP1m8MyJWWWTwzVeCE3wvGfUKD0qgFeQedclvJVZUu37MBzj
     4pTb50FX0t0wluYn0LqWE9fZQnLpB/XDpUDZ+U39p6id3g4Qewb0oENMlfxYWWRgnkKv+Oyqce3noE
     5JaM=",
  "request_sign_uuid":"57e0a766-28ef-355e-7ca2-d8a2dcf23fc4"
}</code></pre>

				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">No response body</code></pre>

				<!-- GET PRIVATE KEY  ==============================================================-->

				<h2 id="get-private-key">Get a Private Key</h2>

				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<th>Request&nbsp;Info</th>
						<th>Value</th>
					</tr>
					<tr>
						<td>HTTP Request method</td>
						<td>GET</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px" >Request URL</td>
						<td>https://keys-private.virgilsecurity.com/v2/private-key/public-key-id/{public-key-id}</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
							The application token header is mandatory in all app requests in order to access the public 
							and private keys service in your app. <a href="keys-service#application-token">See more details...</a>
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px">X-VIRGIL-AUTHENTICATION</td>
						<td>
							Authentication session token, received on <a href="#auth">authentication</a> 
							endpoint.
						</td>
					</tr>
				</table>
									
				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">No request body</code></pre>

				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">{
  "public_key_id": "837619cb-1709-8e1d-2324-12a29a3fd633",
  "private_key": 
    "MIGfAgEAMIGZBgkqhkiG9w0BBwOggYswgYgCAQMxV6NVMFMCAQAwJAYKKoZIhvcNAQwBAzAWBBDU07
     fg99wLPa36lr1V1ewoAgIIAAQo5rZc2/3cfpNqeHjEzphtoGBriaZ05yL/sEX2WKYkaBKMBSnjrSZ1
     /TAqBgkqhkiG9w0BBwEwHQYJYIZIAWUDBAEqBBDkjdlyM+456Z+z0P4TWpwwnMdJKqvCZELINhj1zC
     rqzjstrTH0aaQTKQsoaDsRU3gPc7fwkwFz66wPrbApOedvOOFyGZeuAySJE7+O3odRbECUSQ/bNwiu
     fy6T4IOflnhJb6ur/aptl9H3MOCFtTqpfma4sHXMgvTCTXB98OdOEZ4YZr5MjJBlEJVLaqCrs96wDx
     TkBgFZS7jrVOMqmTS0Vd4DiliYv+hyETpvoogKmItMUdKuzT/CqaIbVrY/h3J7FgVif7X8CHH9pn00
     57RhyAySMzibibHsMTlFG6XRWEbKCEVUIj4zowleNMiIqvhB1CUaGRn4vLssftCmgWITjYqoQodDJ8
     Lezdx+beoCdfm7Z8XNsAWAlrizbuanJP1m8MyJWWWTwzVeCE3wvGfUKD0qgFeQedclvJVZUu37MBzj
     4pTb50FX0t0wluYn0LqWE9fZQnLpB/XDpUDZ+U39p6id3g4Qewb0oENMlfxYWWRgnkKv+Oyqce3noE
     5JaM="
}</code></pre>

				<!-- DELETE PRIVATE KEY  ==============================================================-->

				<h2 id="delete-private-key">Delete Private Key</h2>

				<h3>Request Info</h3>
				<table class="table">
					<tr>
						<th>Request&nbsp;Info</th>
						<th>Value</th>
					</tr>
					<tr>
						<td>HTTP Request method</td>
						<td>DELETE</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px" >Request URL</td>
						<td>https://keys-private.virgilsecurity.com/v2/private-key</td>
					</tr>
				</table>

				<h3>Headers</h3>
				<table class="table">
					<tr>
						<th>Header&nbsp;Name</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>X-VIRGIL-APPLICATION-TOKEN</td>
						<td>
							The application token header is mandatory in all app requests in order to access the public 
							and private keys service in your app. <a href="keys-service#application-token">See more details...</a>
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px">X-VIRGIL-AUTHENTICATION</td>
						<td>
							Authentication session token, received on <a href="#auth">authentication</a> 
							endpoint.
						</td>
					</tr>
					<tr>
						<td>X-VIRGIL-REQUEST-SIGN</td>
						<td>
							Represents the digital signature (in base64 encoded format) of the request body created by 
							the user’s private key using Virgil’s Crypto Library.
						</td>
					</tr>
					<tr>
						<td style="white-space: nowrap;width: 210px">X-VIRGIL-REQUEST-SIGN-PK-ID</td>
						<td>
							The ID represents the public key on Virgil’s Public Keys service and is used to verify 
							the signature in the X-VIRGIL-REQUEST-SIGN header.
						</td>
					</tr>
				</table>

				<h3>Request Parameters</h3>
				<table class="table">
					<tr>
						<th style="white-space: nowrap;width: 210px">Parameter&nbsp;Name</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
					<tr>
						<td>request_sign_uuid</td>
						<td>Random UUID to guarantee the uniqueness of the request body</td>
						<td>uuid</td>
					</tr>
				</table>
									
				<h4>Request Data Example</h4>
				<pre><code class="langauge-json">{
  "request_sign_uuid":"57e0a766-28ef-355e-7ca2-d8a2dcf23fc4"
}</code></pre>

				<h4>Response Data Example</h4>
				<pre><code class="langauge-json">No response body</code></pre>

				<!-- ERROR CODES ==================================================================-->

				<h2 id="error-codes">Error Codes</h2>
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

				<h3>Internal Application Errors</h3>
				<table class="table">
					<tr><td>10001<td>Internal application error.Route was not found.
					<tr><td>10002<td>Internal application error.Route not allowed.
				</table>	

				<h3>Authentication Errors</h3>
				<table class="table">
					<tr><td>20001<td>Password validation failed
					<tr><td>20002<td>User data validation failed
					<tr><td>20003<td>Container was not found
					<tr><td>20004<td>Token validation failed
					<tr><td>20005<td>Token not found
					<tr><td>20006<td>Token has expired
				</table>	

				<h3>Request Sign Errors</h3>
				<table class="table">
					<tr><td>30001<td>Request Sign validation failed
				</table>	

				<h3>Container Errors</h3>
				<table class="table">
					<tr><td>40001<td>Container validation failed
					<tr><td>40002<td>Container was not found
					<tr><td>40003<td>Container already exists
					<tr><td>40004<td>Container password was not specified
					<tr><td>40005<td>Container password validation failed
					<tr><td>40006<td>Container was not found in PKI service
					<tr><td>40007<td>Container type validation failed
				</table>	

				<h3>Private Keys Errors</h3>
				<table class="table">
					<tr><td>50001<td>Public Key ID validation failed
					<tr><td>50002<td>Public Key ID was not found
					<tr><td>50003<td>Public Key ID already exists
					<tr><td>50004<td>Private key validation failed
					<tr><td>50005<td>Private key base64 validation failed
				</table>	

				<h3>Verification Errors</h3>
				<table class="table">
					<tr><td>60001<td>Token was not found in request
					<tr><td>60002<td>User Data validation failed
					<tr><td>60003<td>Container was not found
					<tr><td>60004<td>Verification token hash expired
				</table>	

				<h3>Application Token Errors</h3>
				<table class="table">
					<tr><td>70001<td>Application token invalid
					<tr><td>70002<td>Application token service error
				</table>	

				<h3>Request Sign UUID Errors</h3>
				<table class="table">
					<tr><td>80001<td>Request parameter validation failed
					<tr><td>80002<td>Has already used in another call. Please generate another one.
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
			            <li class="title" role="presentation"><p>Private Keys RESTful API</p></li>
			            <li role="presentation"><a href="#auth">Authenticate a Session</a></li>
			            <li role="presentation"><a href="#init-container">Container Initialization</a></li>
			            <li role="presentation"><a href="#get-container">Get Container Details</a></li>
			            <li role="presentation"><a href="#update-container">Update Container Details</a></li>
			            <li role="presentation"><a href="#reset-container">Reset Container Password</a></li>
			            <li role="presentation"><a href="#persist-container">Persist Container Changes</a></li>
			            <li role="presentation"><a href="#delete-container">Delete Container</a></li>
			            <li role="presentation"><a href="#add-private-key">Push Private Key to Container</a></li>
			            <li role="presentation"><a href="#get-private-key">Get Private Key</a></li>
			            <li role="presentation"><a href="#delete-private-key">Delete Private Key</a></li>
			            <li role="presentation"><a href="#error-codes">Error Codes</a></li>
					</ul>
			</div>
		</div>
	</div>
</div>
@show