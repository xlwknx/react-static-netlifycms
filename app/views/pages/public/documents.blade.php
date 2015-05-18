@section('title')
    Virgil | Documents
@show

@section('content')
<div class="page docs">
    <section class="container docs-get-api-key">
        <a href="/signup" class="btn-virgil btn-transparent">Get API KEY</a>
    </section>

    <section class="container choices">
        <span class="choices-section active" data-tab-show="api-reference">API REFERENCE</span>
        <span class="choices-section" data-tab-show="samples">CODE EXAMPLES</span>
    </section>

    <section class="docs api-reference container md" data-tab="api-reference">

<ul class="api-menu">
	<li>
		Menu
	</li>
	<li>
		<a href="#api-virgil-keys">Virgil Keys</a>
	</li>
	<li>
		<a href="#api-virgil-pki">Virgil PKI</a>
	</li>
	<li>
		<a href="#api-virgil-crypt">Virgil Crypto API</a>
	</li>
</ul>

<div class="api-container">
<div class="api-keys api-docs" id="api-virgil-keys">
<h1 id="virgilkeyring-restful-service">VirgilKeyRing RESTful Service</h1>
<p>RESTful service for private keys managing</p>
<h2 id="api">API</h2>
<ul>
<li><a href="#authentication">Authentication</a><ul>
<li><a href="#get-authenticationget-token">POST /authentication/get-token</a></li>
</ul>
</li>
<li><a href="#key">Key</a><ul>
<li><a href="#get-keyaccountaccount-id">GET /private-key/account/{account-id}</a></li>
<li><a href="#get-keycertificatecertificate-id">GET /private-key/public-key/{public-key-id}</a></li>
<li><a href="#post-key">POST /private-key</a></li>
<li><a href="#delete-key">DELETE /private-key</a></li>
</ul>
</li>
<li><a href="#account">Account</a><ul>
<li><a href="#post-account">POST /account</a></li>
<li><a href="#put-account">PUT /account</a></li>
<li><a href="#put-accountreset">PUT /account/reset</a></li>
<li><a href="#put-accountverify">PUT /account/verify</a></li>
<li><a href="#delete-account">DELETE /account</a></li>
</ul>
</li>
<li><a href="#appendix-a-responses">Appendix A. Repsonses</a></li>
<li><a href="#appendix-b-sign-parameter">Appendix B. Sign Parameter</a></li>
</ul>
<h1 id="authentication">Authentication</h1>
<p><strong><code>Authentication</code></strong> entity endpoints</p>
<h2 id="get-authentication-get-token">GET /authentication/get-token</h2>
<p>Retrieve authentication token.</p>
<p>Service will create <strong><code>Authentication token</code></strong> that will be available during the 60 minutes after creation. During this time service will automatically prolong life time of the token in case if <strong><code>Authentication token</code></strong> widely used so don&#39;t need to prolong it manually. In case when <strong><code>Authentication token</code></strong> is used after 60 minutes of life time, service will throw the appropriate error.</p>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">POST</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">http</span>:</span><span class="hljs-comment">//keyring.virgilsecurity.com/authentication/get-token</span>
Authorization Token    <span class="hljs-keyword">Not</span> needed
</code></pre><p>Request body</p>
<pre><code class="lang-json">{
  "<span class="hljs-attribute">password</span>": <span class="hljs-value"><span class="hljs-string">"password"</span></span>,
  "<span class="hljs-attribute">user_data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">class</span>": <span class="hljs-value"><span class="hljs-string">"user_id"</span></span>,
    "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"email"</span></span>,
    "<span class="hljs-attribute">value</span>": <span class="hljs-value"><span class="hljs-string">"mail@gmail.com"</span>
  </span>}
</span>}
</code></pre>
<p>Response body</p>
<pre><code class="lang-json">{
  "<span class="hljs-attribute">auth_token</span>": <span class="hljs-value"><span class="hljs-string">"dbbbe6a906aa4d567531827beb66a2aadbbbe6a906aa4d567531827beb66a2aa"</span></span>,
}
</code></pre>
<p>Request sample</p>
<pre><code>curl -v -X GET <span class="hljs-keyword">http</span>://keyring.virgilsecurity.com/authentication/<span class="hljs-built_in">get</span>-<span class="hljs-keyword">token</span>
</code></pre><h1 id="private-key">Private Key</h1>
<p><strong><code>Private Key</code></strong> entity endpoints</p>
<h2 id="get-private-key-account-account-id-">GET /private-key/account/{account-id}</h2>
<p>Retrieve Private Key information for requested account.</p>
<p>Header info</p>
<pre><code><span class="hljs-attribute">x-auth-token</span>: <span class="hljs-string">a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8</span>
</code></pre><p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">GET</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">http</span>:</span><span class="hljs-comment">//keyring.virgilsecurity.com/private-key/account/{account-id}</span>
Authorization Token    Needed
</code></pre><p>Request body</p>
<pre><code><span class="hljs-deletion">-</span>
</code></pre><p>Response body</p>
<pre><code class="lang-json">{
  "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"73d2288c-7c50-08d0-3526-4be366afef2a"</span></span>,
  "<span class="hljs-attribute">account_type</span>": <span class="hljs-value"><span class="hljs-string">"easy"</span></span>,
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
        {
            "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span></span>,
            "<span class="hljs-attribute">private_key</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span>
        </span>},
        {
            "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span></span>,
            "<span class="hljs-attribute">private_key</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span>
        </span>}
    ]
</span>}
</code></pre>
<p>Request sample</p>
<pre><code>curl -v -X GET <span class="hljs-string">http:</span><span class="hljs-comment">//keyring.virgilsecurity.com/private-key/account/6480ba7a-1b68-141e-b547-ef8d9adc3145</span>
</code></pre><h2 id="get-private-key-public-key-public-key-id-">GET /private-key/public-key/{public-key-id}</h2>
<p>Get Private Key data by public key.</p>
<p>Header info</p>
<pre><code><span class="hljs-attribute">x-auth-token</span>: <span class="hljs-string">a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8</span>
</code></pre><p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">GET</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">http</span>:</span><span class="hljs-comment">//keyring.virgilsecurity.com/private-key/public-key/{public-key-id}</span>
Authorization Token    Needed
</code></pre><p>Request body</p>
<pre><code><span class="hljs-deletion">-</span>
</code></pre><p>Response body</p>
<pre><code class="lang-json">{
  "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"73d2288c-7c50-08d0-3526-4be366afef2a"</span></span>,
  "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span></span>,
  "<span class="hljs-attribute">private_key</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span>
</span>}
</code></pre>
<p>Request sample</p>
<pre><code>curl -v -X GET http://keyring.virgilsecurity.com/<span class="hljs-keyword">private</span>-key/<span class="hljs-keyword">public</span>-key-id/6480ba7a-1b68-141e-b547-ef8d9adc3145
</code></pre><h2 id="post-private-key">POST /private-key</h2>
<p>Create Private Key data.</p>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">POST</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">http</span>:</span><span class="hljs-comment">//keyring.virgilsecurity.com/private-key</span>
Authorization          <span class="hljs-keyword">Not</span> needed
</code></pre><p>Request body</p>
<pre><code class="lang-json">{
  "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"73d2288c-7c50-08d0-3526-4be366afef2a"</span></span>,
  "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span></span>,
  "<span class="hljs-attribute">sign</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span></span>,
  "<span class="hljs-attribute">private_key</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span>
</span>}
</code></pre>
<p>Response body</p>
<pre><code class="lang-json">{
  "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"73d2288c-7c50-08d0-3526-4be366afef2a"</span></span>,
  "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span></span>,
  "<span class="hljs-attribute">private_key</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span>
</span>}
</code></pre>
<p>Request sample</p>
<pre><code><span class="hljs-title">curl</span> -v -<span class="hljs-type">X</span> <span class="hljs-type">POST</span> http://keyring.virgilsecurity.com/private-key -<span class="hljs-typedef"><span class="hljs-keyword">data</span> <span class="hljs-container">{"<span class="hljs-title">account_id</span>": "6F9619FF-8B86-<span class="hljs-type">D011</span>-<span class="hljs-type">B42D</span>-00CF4FC964F1","<span class="hljs-title">public_key_id</span>": "6F34195F-9A86-<span class="hljs-type">B022</span>-<span class="hljs-type">B65D</span>-22CF4FC456F1","<span class="hljs-title">key</span>": "<span class="hljs-type">BASE64</span>-<span class="hljs-type">ENCODED</span>-<span class="hljs-type">STRING</span>", "<span class="hljs-title">sign</span>": "<span class="hljs-type">BASE64</span>-<span class="hljs-type">ENCODED</span>-<span class="hljs-type">STRING</span>"}</span></span>
</code></pre><h2 id="delete-private-key">DELETE /private-key</h2>
<p>Delete Private Key data by public key.</p>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">DELETE</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">http</span>:</span><span class="hljs-comment">//keyring.virgilsecurity.com/private-key</span>
Authorization          <span class="hljs-keyword">Not</span> needed
</code></pre><p>Request body</p>
<pre><code class="lang-json">{
  "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span></span>,
  "<span class="hljs-attribute">sign</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span>
</span>}
</code></pre>
<p>Response body</p>
<pre><code><span class="hljs-deletion">-</span>
</code></pre><p>Request sample</p>
<pre><code>curl -v -X DELETE http://keyring.virgilsecurity.com/<span class="hljs-keyword">private</span>-key --data '{<span class="hljs-string">"public_key_id"</span>: <span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span>, <span class="hljs-string">"digest"</span>: <span class="hljs-string">"BASE64-ENCODED-STRING"</span>}'
</code></pre><h1 id="account">Account</h1>
<p><strong><code>Account</code></strong> entity endpoints</p>
<h2 id="post-account">POST /account</h2>
<p>Create Account information.</p>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">POST</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">http</span>:</span><span class="hljs-comment">//keyring.virgilsecurity.com/account</span>
Authorization          <span class="hljs-keyword">Not</span> needed
</code></pre><p>Request body</p>
<pre><code class="lang-json">{
  "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"73d2288c-7c50-08d0-3526-4be366afef2a"</span></span>,
  "<span class="hljs-attribute">account_type</span>": <span class="hljs-value"><span class="hljs-string">"normal"</span></span>,
  "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span></span>,
  "<span class="hljs-attribute">sign</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span></span>,
  "<span class="hljs-attribute">password</span>": <span class="hljs-value"><span class="hljs-string">"password"</span></span>,
}
</code></pre>
<p>OR</p>
<pre><code class="lang-json">{
  "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"73d2288c-7c50-08d0-3526-4be366afef2a"</span></span>,
  "<span class="hljs-attribute">account_type</span>": <span class="hljs-value"><span class="hljs-string">"easy"</span></span>,
  "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span></span>,
  "<span class="hljs-attribute">sign</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span></span>,
  "<span class="hljs-attribute">password</span>": <span class="hljs-value"><span class="hljs-string">"password"</span>
</span>}
</code></pre>
<p>Response body</p>
<pre><code class="lang-json">{
  "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"73d2288c-7c50-08d0-3526-4be366afef2a"</span></span>,
}
</code></pre>
<p>Request sample</p>
<pre><code><span class="hljs-keyword">curl</span> -v -X POST http://keyring.virgilsecurity.com/account --data '{<span class="hljs-string">"account_id"</span>: <span class="hljs-string">"6F9619FF-8B86-D011-B42D-00CF4FC964F1"</span>, <span class="hljs-string">"account_type"</span>:<span class="hljs-string">"normal"</span>, <span class="hljs-string">"password"</span>: <span class="hljs-string">"password"</span>, <span class="hljs-string">"public_key_id"</span>: <span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span>, <span class="hljs-string">"sign"</span>: <span class="hljs-string">"BASE64-ENCODED-STRING"</span>}'
</code></pre><h2 id="put-account">PUT /account</h2>
<p>Update Account information.</p>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">PUT</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">http</span>:</span><span class="hljs-comment">//keyring.virgilsecurity.com/account</span>
Authorization          <span class="hljs-keyword">Not</span> needed
</code></pre><p>Request body</p>
<pre><code class="lang-json">{
  "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"73d2288c-7c50-08d0-3526-4be366afef2a"</span></span>,
  "<span class="hljs-attribute">account_type</span>": <span class="hljs-value"><span class="hljs-string">"normal"</span></span>,
  "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span></span>,
  "<span class="hljs-attribute">sign</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span></span>,
  "<span class="hljs-attribute">password</span>": <span class="hljs-value"><span class="hljs-string">"password"</span>
</span>}
</code></pre>
<p>OR</p>
<pre><code class="lang-json">{
  "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"73d2288c-7c50-08d0-3526-4be366afef2a"</span></span>,
  "<span class="hljs-attribute">account_type</span>": <span class="hljs-value"><span class="hljs-string">"easy"</span></span>,
  "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span></span>,
  "<span class="hljs-attribute">sign</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span></span>,
  "<span class="hljs-attribute">password</span>": <span class="hljs-value"><span class="hljs-string">"password"</span>
</span>}
</code></pre>
<p>Response body</p>
<pre><code><span class="hljs-deletion">-</span>
</code></pre><p>Request sample</p>
<pre><code><span class="hljs-keyword">curl</span> -v -X PUT http://keyring.virgilsecurity.com/account --data '{<span class="hljs-string">"account_id"</span>: <span class="hljs-string">"6F9619FF-8B86-D011-B42D-00CF4FC964F1"</span>, <span class="hljs-string">"account_type"</span>:<span class="hljs-string">"normal"</span>, <span class="hljs-string">"password"</span>: <span class="hljs-string">"password"</span>, <span class="hljs-string">"public_key_id"</span>: <span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span>, <span class="hljs-string">"sign"</span>: <span class="hljs-string">"BASE64-ENCODED-STRING"</span>}'
</code></pre><h2 id="put-account-reset">PUT /account/reset</h2>
<p>Rest Account password.</p>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">PUT</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">http</span>:</span><span class="hljs-comment">//keyring.virgilsecurity.com/account/reset</span>
Authorization          <span class="hljs-keyword">Not</span> needed
</code></pre><p>Request body</p>
<pre><code class="lang-json">{
  "<span class="hljs-attribute">user_data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">class</span>": <span class="hljs-value"><span class="hljs-string">"user_id"</span></span>,
    "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"email"</span></span>,
    "<span class="hljs-attribute">value</span>": <span class="hljs-value"><span class="hljs-string">"mail@gmail.com"</span>
  </span>}</span>,
  "<span class="hljs-attribute">new_password</span>": <span class="hljs-value"><span class="hljs-string">"new_password"</span>
</span>}
</code></pre>
<p>Response body</p>
<pre><code><span class="hljs-deletion">-</span>
</code></pre><p>Request sample</p>
<pre><code>curl -v -X PUT http://keyring.virgilsecurity.com/account/reset --data '{<span class="hljs-string">"user_data"</span>: {<span class="hljs-string">"class"</span>: <span class="hljs-string">"user_id"</span>, <span class="hljs-string">"type"</span>: <span class="hljs-string">"email"</span>,
<span class="hljs-string">"value"</span>: <span class="hljs-string">"user_name@gmail.com"</span>}, <span class="hljs-string">"password"</span>: <span class="hljs-string">"new_password"</span>}'
</code></pre><h2 id="put-account-verify">PUT /account/verify</h2>
<p>Verify password token and re-encrypt key data with the new password.</p>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">PUT</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">http</span>:</span><span class="hljs-comment">//keyring.virgilsecurity.com/account/verify</span>
Authorization          <span class="hljs-keyword">Not</span> needed
</code></pre><p>Request body</p>
<pre><code class="lang-json">{
  "<span class="hljs-attribute">token</span>": <span class="hljs-value"><span class="hljs-string">"f2d6ed7d3509295265c6e4e37e141db0"</span></span>,
}
</code></pre>
<p>Response body</p>
<pre><code class="lang-json">{
  "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"73d2288c-7c50-08d0-3526-4be366afef2a"</span></span>,
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
        {
            "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span></span>,
            "<span class="hljs-attribute">private_key</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span>
        </span>},
        {
            "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span></span>,
            "<span class="hljs-attribute">private_key</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span>
        </span>}
    ]
</span>}
</code></pre>
<p>Request sample</p>
<pre><code><span class="hljs-title">curl</span> -v -X PUT <span class="hljs-url">http://keyring.virgilsecurity.com/account/verify</span> --data <span class="hljs-string">'{"token": "f2d6ed7d3509295265c6e4e37e141db0"}'</span>
</code></pre><h2 id="delete-account">DELETE /account</h2>
<p>Delete account object by account id.</p>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">DELETE</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">http</span>:</span><span class="hljs-comment">//keyring.virgilsecurity.com/account</span>
Authorization          <span class="hljs-keyword">Not</span> needed
</code></pre><p>Request body</p>
<pre><code class="lang-json">{
  "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"6480ba7a-1b68-141e-b547-ef8d9adc3145"</span></span>,
  "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span></span>,
  "<span class="hljs-attribute">sign</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span>
</span>}
</code></pre>
<p>Response body</p>
<pre><code><span class="hljs-deletion">-</span>
</code></pre><p>Request sample</p>
<pre><code><span class="hljs-keyword">curl</span> -v -X DELETE http://keyring.virgilsecurity.com/account --data '{<span class="hljs-string">"account_id"</span>: <span class="hljs-string">"6480ba7a-1b68-141e-b547-ef8d9adc3145"</span>, <span class="hljs-string">"public_key_id"</span>: <span class="hljs-string">"837619cb-1709-8e1d-2324-12a29a3fd633"</span>, <span class="hljs-string">"sign"</span>: <span class="hljs-string">"BASE64-ENCODED-STRING"</span>}'
</code></pre><h1 id="appendix-a-responses">Appendix A. Responses</h1>
<p>Application uses standard HTTP response codes:</p>
<pre><code><span class="hljs-number">200</span> - Success
<span class="hljs-number">400</span> - <span class="hljs-built_in">Request</span> <span class="hljs-keyword">error</span>
<span class="hljs-number">401</span> - Authorization <span class="hljs-keyword">error</span>
<span class="hljs-number">500</span> - <span class="hljs-built_in">Server</span> <span class="hljs-keyword">error</span>
</code></pre><p>Additional information about the error is returned as JSON-object like:</p>
<pre><code class="lang-json">{
    "<span class="hljs-attribute">error</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">code</span>": <span class="hljs-value"><span class="hljs-string">"{error-code}"</span>
    </span>}
</span>}
</code></pre>
<p><strong><code>HTTP 501. Server error</code></strong> status is returned on internal server error</p>
<pre><code><span class="hljs-number">10001</span> - Internal <span class="hljs-type">application</span> <span class="hljs-keyword">error</span>. Route was <span class="hljs-keyword">not</span> found.
<span class="hljs-number">10002</span> - Internal <span class="hljs-type">application</span> <span class="hljs-keyword">error</span>. Route <span class="hljs-keyword">not</span> allowed.
</code></pre><p><strong><code>HTTP 400. Request error</code></strong> status is returned on request data validation errors</p>
<pre><code><span class="hljs-number">20001</span> - Athentication password validation failed
<span class="hljs-number">20002</span> - Athentication user data validation failed
<span class="hljs-number">20003</span> - Athentication account was <span class="hljs-keyword">not</span> found <span class="hljs-keyword">by</span> provided user data
<span class="hljs-number">20004</span> - Athentication token validation failed
<span class="hljs-number">20005</span> - Athentication token <span class="hljs-keyword">not</span> found
<span class="hljs-number">20006</span> - Athentication token has expired

<span class="hljs-number">30001</span> - Signed validation failed

<span class="hljs-number">40001</span> - Account validation failed
<span class="hljs-number">40002</span> - Account was <span class="hljs-keyword">not</span> found
<span class="hljs-number">40003</span> - Account already exists
<span class="hljs-number">40004</span> - Account password was <span class="hljs-keyword">not</span> specified
<span class="hljs-number">40005</span> - Account password validation failed
<span class="hljs-number">40006</span> - Account was <span class="hljs-keyword">not</span> found <span class="hljs-keyword">in</span> PKI service
<span class="hljs-number">40007</span> - Account type validation failed

<span class="hljs-number">50001</span> - <span class="hljs-keyword">Public</span> <span class="hljs-keyword">Key</span> validation failed
<span class="hljs-number">50002</span> - <span class="hljs-keyword">Public</span> <span class="hljs-keyword">Key</span> was <span class="hljs-keyword">not</span> found
<span class="hljs-number">50003</span> - <span class="hljs-keyword">Public</span> <span class="hljs-keyword">Key</span> already exists
<span class="hljs-number">50004</span> - <span class="hljs-keyword">Public</span> <span class="hljs-keyword">Key</span> <span class="hljs-keyword">private</span> <span class="hljs-keyword">key</span> validation failed
<span class="hljs-number">50005</span> - <span class="hljs-keyword">Public</span> <span class="hljs-keyword">Key</span> <span class="hljs-keyword">private</span> <span class="hljs-keyword">key</span> base64 validation failed

<span class="hljs-number">60001</span> - Token was <span class="hljs-keyword">not</span> found <span class="hljs-keyword">in</span> request
<span class="hljs-number">60002</span> - User Data validation failed
<span class="hljs-number">60003</span> - Account was <span class="hljs-keyword">not</span> found <span class="hljs-keyword">by</span> user data
<span class="hljs-number">60004</span> - Verification token ash expired
</code></pre><h1 id="appendix-b-sign-parameter">Appendix B. Sign Parameter</h1>
<p>The <strong>Sign</strong> parameter is calculated on client according next rules:</p>
<pre><code>SIGN = VirgilSigner::<span class="hljs-function"><span class="hljs-title">sign</span><span class="hljs-params">(PUBLIC_KEY, PUBLIC_KEY, PRIVATE_KEY)</span></span>
SIGN = <span class="hljs-function"><span class="hljs-title">base64_encode</span><span class="hljs-params">(SIGN-&gt;toJson()</span></span>)
</code></pre><ul>
<li><strong>PUBLIC_KEY</strong> - public key that will be signed with private key</li>
<li><strong>PUBLIC_KEY</strong> - The KeyRing public key</li>
<li><strong>PRIVATE_KEY</strong> - KeyRing private key</li>
<li><strong>VirgilSigner::sign</strong> - Virgil Security library method to sign the data</li>
</ul>
<h3 id="server-sign-validation">Server Sign validation</h3>
<p>To authorize the request on server, this step is executed:</p>
<pre><code>VIRGIL_SIGN <span class="hljs-subst">=</span> VirgilSign()
VIRGIL_SIGN<span class="hljs-subst">-&gt;</span>fromJson(base64_decode(SIGN))
VirgilSigner<span class="hljs-tag">::verify</span>(PUBLIC_KEY, VIRGIL_SIGN, PUBLIC_KEY) <span class="hljs-subst">===</span> <span class="hljs-literal">True</span>
</code></pre><ul>
<li><strong>PUBLIC_KEY</strong> - The KeyRing public key</li>
<li><strong>VIRGIL_SIGN</strong> - signed public key</li>
<li><strong>PUBLIC_KEY</strong> - the public key extracted from the PKI service</li>
<li><strong>VirgilSigner::verify</strong> - Virgil Security low-level API function to verify the sign</li>
</ul>
</div>
<div class="api-pki api-docs" id="api-virgil-pki">
	PKI
</div>
<div class="api-crypto api-docs" id="api-virgil-crypt">
	CRYPT
</div>
</div>

    </section>

    <section class="code-tabs container hide" data-tab="samples">
        <div class="code-tabs-nav">
            <img class="code-tabs-dots" src="/img/docs/window-dots.png" alt="dots.." />
            <button class="code-tabs-nav-item" data-section="php">PHP</button>
            <button class="code-tabs-nav-item" data-section="c#">C#</button>
        </div>

        <div class="code-tabs-subnav">
            <button class="code-tabs-nav-item code-tabs-subnav-item" data-code-tab="encrypt">encrypt</button>
            <button class="code-tabs-nav-item code-tabs-subnav-item" data-code-tab="decrypt">decrypt</button>
        </div>

        <div class="sections">
            <div class="section" data-section="php">
                    <pre data-code-tab="encrypt">
    <code class="lang-js">var marked = require('marked');
        var markdownString = '```js\n console.log("hello"); \n```';

        // Async highlighting with pygmentize-bundled
        marked.setOptions({
        highlight: function (code, lang, callback) {
        require('pygmentize-bundled')({ lang: lang, format: 'html' }, code, function (err, result) {
        callback(err, result.toString());
        });
        }
        });

        // Using async version of marked
        marked(markdownString, function (err, content) {
        if (err) throw err;
        console.log(content);
        });

        // Synchronous highlighting with highlight.js
        marked.setOptions({
        highlight: function (code) {
        return require('highlight.js').highlightAuto(code).value;
        }
        });

        console.log(marked(markdownString));
    </code>
                    </pre>
                    <pre data-code-tab="decrypt">
                        php decrypt
                    </pre>
            </div>

            <div class="section" data-section="c#">
                    <pre data-code-tab="encrypt">
                        c# encrypt
                    </pre>
                    <pre data-code-tab="decrypt">
                        c# decrypt
                    </pre>
            </div>
        </div>
    </section>
</div>
@stop
