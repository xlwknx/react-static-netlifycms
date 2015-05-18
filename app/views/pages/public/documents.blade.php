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
      <a href="#public-keys-api">Public Keys API</a>
      <ul>
        <li>
          <a href="#pki-public-keys">Public Keys</a>
        </li>
        <li>
          <a href="#pki-user-data">User Data</a>
        </li>
        <li>
          <a href="#pki-search">Search</a>
        </li>
        <li>
          <a href="#pki-error-codes">Error Codes</a>
        </li>
      </ul>
    </li>
    <li>
      <a href="#private-keys-api">Private Keys API</a>
      <ul>
        <li>
          <a href="#keyring-authentication">Authentication</a>
        </li>
        <li>
          <a href="#keyring-private-keys">Private Keys</a>
        </li>
        <li>
          <a href="#keyring-account">Account</a>
        </li>
        <li>
          <a href="#keyring-error-codes">Error Codes</a>
        </li>
      </ul>
    </li>
  </ul>

  <div class="api-container">
  <div class="api-keys api-docs" id="public-keys-api">
<h1 id="public-keys-management-api">Public Keys Management API</h1>
<p>PKI service is responsible for management of user&#39;s identities (like email, mobile, etc.) and corresponding public keys.</p>
<p>Service entities are: </p>
<ul>
<li>Account - represents the service customer. Top-level entity that aggregates all user&#39;s public keys. </li>
<li>Public Key - holds public key information for user&#39;s account and aggregates user identities related to this public key.</li>
<li>UserData - validated user information pieces that use public key to encrypt the data.</li>
</ul>
<h2 id="#pki-public-keys">Public Keys Management</h2>
<ul>
<li><a href="#post-objectspublic-key-add-use-case">POST /objects/public-key (ADD use-case)</a></li>
<li><a href="#post-objectspublic-key-create-use-case">POST /objects/public-key (CREATE use-case)</a></li>
<li><a href="#get-objectspublic-keypublic-key-id">GET /objects/public-key/{public-key-id}</a></li>
</ul>
<p>Create <strong><code>Public Key</code></strong> endpoint has two different use-cases:</p>
<ul>
<li><strong><code>ADD</code></strong>. Creates <strong><code>Public Key</code></strong> for <strong><code>Account</code></strong> specified by <strong>account_id</strong> parameter. The authorization is <strong>NEEDED</strong> and <strong>account_id</strong> parameter required.</li>
<li><strong><code>CREATE</code></strong>. Creates new <strong><code>Public key</code></strong>. The authorization is <strong>NOT NEEDED</strong> and <strong>account_id</strong> parameter is omitted.</li>
</ul>
<p><strong>user_data</strong> parameter is optional when <strong><code>Public Key</code></strong> get created.</p>
<h2 id="post-objectspublic-key-add-use-case">POST /objects/public-key (ADD use-case)</h2>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">POST</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">https</span>:</span><span class="hljs-comment">//pki.virgilsecurity.com/objects/public-key</span>
Authorization          Needed
Parameters             public_key - base64 encoded <span class="hljs-keyword">public</span> key string
</code></pre><p>Request body</p>
<pre><code class="lang-json">{
    "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"30a7e1b3-e763-4789-a54d-fcc53dcf973a"</span></span>,
    "<span class="hljs-attribute">public_key</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span></span>,
    "<span class="hljs-attribute">user_data</span>": <span class="hljs-value">[                                             
        {
            "<span class="hljs-attribute">class</span>": <span class="hljs-value"><span class="hljs-string">"user_id"</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"email"</span></span>,
            "<span class="hljs-attribute">value</span>": <span class="hljs-value"><span class="hljs-string">"user@virgilsecurity.com"</span>
        </span>},
        {
            "<span class="hljs-attribute">class</span>": <span class="hljs-value"><span class="hljs-string">"user_id"</span></span>,
            "<span class="hljs-attribute">type</span>" : <span class="hljs-value"><span class="hljs-string">"domain"</span></span>,
            "<span class="hljs-attribute">value</span>": <span class="hljs-value"><span class="hljs-string">"helpdsk.virgilsecurity.com"</span>
        </span>},
    ]</span>,
    "<span class="hljs-attribute">guid</span>": <span class="hljs-value"><span class="hljs-string">"a53e98e4-0197-4513-be6d-49836e406aaa"</span>
</span>}
</code></pre>
<p>Response body</p>
<pre><code class="lang-json">{
    "<span class="hljs-attribute">id</span>" : <span class="hljs-value">{
        "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"3a768eea-cbda-4926-a82d-831cb89092aa"</span></span>,
        "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"17084b40-08f5-4bcd-a739-c0d08c176bad"</span>
    </span>}</span>,
    "<span class="hljs-attribute">public_key</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span></span>,
    "<span class="hljs-attribute">user_data</span>": <span class="hljs-value">[]
</span>}
</code></pre>
<p>Request sample</p>
<pre><code>curl -v -X POST https://pki.virgilsecurity.com/objects/<span class="hljs-keyword">public</span>-key --data '{<span class="hljs-string">"account_id"</span>: <span class="hljs-string">"30a7e1b3-e763-4789-a54d-fcc53dcf973a"</span>, <span class="hljs-string">"public_key"</span> : <span class="hljs-string">"BASE64-ENCODED-STRING"</span>, <span class="hljs-string">"guid"</span>: <span class="hljs-string">"a53e98e4-0197-4513-be6d-49836e406aaa"</span>}'
</code></pre><h2 id="post-objectspublic-key-create-use-case">POST /objects/public-key (CREATE use-case)</h2>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">POST</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">https</span>:</span><span class="hljs-comment">//pki.virgilsecurity.com/objects/public-key</span>
Authorization          <span class="hljs-keyword">Not</span> Needed
</code></pre><p>Request body</p>
<pre><code class="lang-json">{
    "<span class="hljs-attribute">public_key</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span></span>,
    "<span class="hljs-attribute">user_data</span>": <span class="hljs-value">[                                              
        {
            "<span class="hljs-attribute">class</span>": <span class="hljs-value"><span class="hljs-string">"user_id"</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"email"</span></span>,
            "<span class="hljs-attribute">value</span>": <span class="hljs-value"><span class="hljs-string">"user@virgilsecurity.com"</span>
        </span>},
        {
            "<span class="hljs-attribute">class</span>": <span class="hljs-value"><span class="hljs-string">"user_id"</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"application"</span></span>,
            "<span class="hljs-attribute">value</span>": <span class="hljs-value"><span class="hljs-string">"helpdesk.virgilsecurity.com"</span>
        </span>},
    ]</span>,
    "<span class="hljs-attribute">guid</span>": <span class="hljs-value"><span class="hljs-string">"a53e98e4-0197-4513-be6d-49836e406aaa"</span>
</span>}
</code></pre>
<p>Response body</p>
<pre><code class="lang-json">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"3a768eea-cbda-4926-a82d-831cb89092aa"</span></span>,
        "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"17084b40-08f5-4bcd-a739-c0d08c176bad"</span>
    </span>}</span>,
    "<span class="hljs-attribute">public_key</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span></span>,
    "<span class="hljs-attribute">user_data</span>": <span class="hljs-value">[]
</span>}
</code></pre>
<p>Request sample</p>
<pre><code>curl -v -X POST https://pki.virgilsecurity.com/objects/<span class="hljs-keyword">public</span>-key --data '{<span class="hljs-string">"public_key"</span> : <span class="hljs-string">"BASE64-ENCODED-STRING"</span>, <span class="hljs-string">"guid"</span>: <span class="hljs-string">"a53e98e4-0197-4513-be6d-49836e406aaa"</span>}'
</code></pre><h2 id="get-objectspublic-keypublic-key-id">GET /objects/public-key/{public-key-id}</h2>
<p>Retrieve the information on <strong><code>Public Key</code></strong> including all nested <strong><code>UserData</code></strong> items.</p>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">GET</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">https</span>:</span><span class="hljs-comment">//pki.virgilsecurity.com/objects/public-key/{public-key-id}</span>
Authorization          <span class="hljs-keyword">Not</span> needed
</code></pre><p>Request body</p>
<pre><code><span class="hljs-deletion">-</span>
</code></pre><p>Response body</p>
<pre><code class="lang-json">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"d63a8ffd-bdac-498c-b861-a53e11989cef"</span></span>,
        "<span class="hljs-attribute">public-key_id</span>": <span class="hljs-value"><span class="hljs-string">"deb17e15-d47c-449f-b1b0-4d55247d153f"</span>
    </span>}</span>,
    "<span class="hljs-attribute">public_key</span>": <span class="hljs-value"><span class="hljs-string">"BASE64-ENCODED-STRING"</span></span>,
    "<span class="hljs-attribute">user_data</span>": <span class="hljs-value">[
        {
            "<span class="hljs-attribute">class</span>": <span class="hljs-value"><span class="hljs-string">"user_id"</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"phone"</span></span>,
            "<span class="hljs-attribute">value</span>": <span class="hljs-value"><span class="hljs-string">"+1 123 777 7777"</span></span>,
            "<span class="hljs-attribute">is_confirmed</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
        </span>},
        {
            "<span class="hljs-attribute">class</span>": <span class="hljs-value"><span class="hljs-string">"user_id"</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"email"</span></span>,
            "<span class="hljs-attribute">value</span>": <span class="hljs-value"><span class="hljs-string">"domenik.reve@virgilsecurity.com"</span></span>,
            "<span class="hljs-attribute">is_confirmed</span>": <span class="hljs-value"><span class="hljs-literal">true</span>
        </span>}
    ]
</span>}
</code></pre>
<p>Request sample</p>
<pre><code>curl -v -<span class="hljs-constant">X GET </span><span class="hljs-symbol">https:</span>/<span class="hljs-regexp">/pki.virgilsecurity.com/objects</span><span class="hljs-regexp">/public-key/</span><span class="hljs-number">6480</span>ba7a-<span class="hljs-number">1</span>b68-<span class="hljs-number">141</span>e-b547-ef8d9adc3145
</code></pre><h2 id="pki-user-data">User Data Management</h2>
<ul>
<li><a href="#post-objectsuserdata">POST /objects/user-data</a></li>
<li><a href="#post-objectsuser-datauser-data-idactionsconfirm">POST /objects/user-data/{user-data-id}/actions/confirm</a></li>
<li><a href="#post-objectsuser-datauser-data-idactionsresend-confirmation">POST /objects/user-data/{user-data-id}/actions/resend-confirmation</a></li>
</ul>
<p>Available UserData class/type combinations are:</p>
<ul>
<li>user_id <pre><code class="lang-json">  <span class="hljs-string">"class"</span>: <span class="hljs-string">"user_id"</span>,
  <span class="hljs-string">"type"</span>: <span class="hljs-string">"email"</span>,
  <span class="hljs-string">"value"</span>: <span class="hljs-string">"user<span class="hljs-variable">@virgilsecurity</span>.com"</span>
</code></pre>
<pre><code class="lang-json">  <span class="hljs-string">"class"</span>: <span class="hljs-string">"user_id"</span>,
  <span class="hljs-string">"type"</span>: <span class="hljs-string">"domain"</span>,
  <span class="hljs-string">"value"</span>: <span class="hljs-string">"virgilsecurity.com"</span>
</code></pre>
</li>
<li>user_info<pre><code class="lang-json">  <span class="hljs-string">"class"</span>: <span class="hljs-string">"user_info"</span>,
  <span class="hljs-string">"type"</span>: <span class="hljs-string">"first_name"</span>
  <span class="hljs-string">"value"</span>: <span class="hljs-string">"Bob"</span>
</code></pre>
<pre><code class="lang-json">  <span class="hljs-string">"class"</span>: <span class="hljs-string">"user_info"</span>,
  <span class="hljs-string">"type"</span>: <span class="hljs-string">"last_name"</span>
  <span class="hljs-string">"value"</span>: <span class="hljs-string">"Bobson"</span>
</code></pre>
</li>
</ul>
<h2 id="post-objects-user-data">POST /objects/user-data</h2>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">POST</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">https</span>:</span><span class="hljs-comment">//pki.virgilsecurity.com/objects/user-data</span>
Authorization          Needed
</code></pre><p>Request body</p>
<pre><code class="lang-json">{
   "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"30a7e1b3-e763-4789-a54d-fcc53dcf973a"</span></span>,
   "<span class="hljs-attribute">class</span>": <span class="hljs-value"><span class="hljs-string">"user_info"</span></span>,
   "<span class="hljs-attribute">type</span>" : <span class="hljs-value"><span class="hljs-string">"last_name"</span></span>,
   "<span class="hljs-attribute">value</span>": <span class="hljs-value"><span class="hljs-string">"Maley"</span></span>,
   "<span class="hljs-attribute">guid</span>": <span class="hljs-value"><span class="hljs-string">"3a768eea-cbda-4926-a82d-831cb89092aa"</span>
</span>}
</code></pre>
<pre><code class="lang-json">{
   "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"30a7e1b3-e763-4789-a54d-fcc53dcf973a"</span></span>,
   "<span class="hljs-attribute">class</span>" : <span class="hljs-value"><span class="hljs-string">"user_id"</span></span>,
   "<span class="hljs-attribute">type</span>" : <span class="hljs-value"><span class="hljs-string">"email"</span></span>,
   "<span class="hljs-attribute">value</span>" : <span class="hljs-value"><span class="hljs-string">"daniel.rehl@virgilsecurity.com"</span></span>,
   "<span class="hljs-attribute">guid</span>": <span class="hljs-value"><span class="hljs-string">"3a768eea-cbda-4926-a82d-831cb89092aa"</span>
</span>}
</code></pre>
<p>Response body</p>
<pre><code class="lang-json">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"3a768eea-cbda-4926-a82d-831cb89092aa"</span></span>,
        "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"17084b40-08f5-4bcd-a739-c0d08c176bad"</span></span>,
        "<span class="hljs-attribute">user_data_id</span>": <span class="hljs-value"><span class="hljs-string">"e33898de-6302-4756-8f0c-5f6c5218e02e"</span>
    </span>}</span>,
    "<span class="hljs-attribute">class</span>": <span class="hljs-value"><span class="hljs-string">"user_id"</span></span>,
    "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"email"</span></span>,
    "<span class="hljs-attribute">value</span>": <span class="hljs-value"><span class="hljs-string">"daniel.rehl@vitgilsecurity.com"</span>
</span>}
</code></pre>
<p>Request sample</p>
<pre><code>curl -v -X POST https://pki.virgilsecurity.com/objects/<span class="hljs-literal">user</span>-data --data '{<span class="hljs-string">"public_key_id"</span>: <span class="hljs-string">"30a7e1b3-e763-4789-a54d-fcc53dcf973a"</span>, <span class="hljs-string">"class"</span>: <span class="hljs-string">"user_id"</span>, <span class="hljs-string">"type"</span>: <span class="hljs-string">"email"</span>, <span class="hljs-string">"value"</span>: <span class="hljs-string">"daniel.rehl@virgilsecurity.com"</span>, <span class="hljs-string">"guid"</span>: <span class="hljs-string">"a53e98e4-0197-4513-be6d-49836e406aaa"</span>}'
</code></pre><h2 id="get-objects-user-data-user-data-id-">GET /objects/user-data/{user-data-id}</h2>
<p>Retrieve the information on <strong><code>UserData</code></strong>.</p>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">GET</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">https</span>:</span><span class="hljs-comment">//pki.virgilsecurity.com/objects/user-data/{user-data-id}</span>
Authorization          <span class="hljs-keyword">Not</span> needed
</code></pre><p>Request body</p>
<pre><code><span class="hljs-deletion">-</span>
</code></pre><p>Response body</p>
<pre><code class="lang-json">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"e33898de-6302-4756-8f0c-5f6c5218e02e"</span></span>,
        "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"30a7e1b3-e763-4789-a54d-fcc53dcf973a"</span></span>,
        "<span class="hljs-attribute">user_data_id</span>": <span class="hljs-value"><span class="hljs-string">"cd171f7c-560d-4a62-8d65-16b87419a58c"</span>
    </span>}</span>,
    "<span class="hljs-attribute">class</span>": <span class="hljs-value"><span class="hljs-string">"user_id"</span></span>,
    "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"email"</span></span>,
    "<span class="hljs-attribute">value</span>": <span class="hljs-value"><span class="hljs-string">"user@virgilsecurity.com"</span>
</span>}
</code></pre>
<p>Request sample</p>
<pre><code>curl -v -<span class="hljs-constant">X GET </span><span class="hljs-symbol">https:</span>/<span class="hljs-regexp">/pki.virgilsecurity.com/objects</span><span class="hljs-regexp">/user-data/</span><span class="hljs-number">6480</span>ba7a-<span class="hljs-number">1</span>b68-<span class="hljs-number">141</span>e-b547-ef8d9adc3145
</code></pre><h2 id="post-objects-user-data-user-data-id-actions-confirm">POST /objects/user-data/{user-data-id}/actions/confirm</h2>
<p>Confirm <strong><code>UserData</code></strong> ownership by specifying the code received on registration</p>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">POST</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">https</span>:</span><span class="hljs-comment">//pki.virgilsecurity.com/objects/user-data/{user-data-id}/actions/confirm</span>
Authorization          Needed
</code></pre><p>Request body</p>
<pre><code class="lang-json">{
    "<span class="hljs-attribute">code</span>": <span class="hljs-value"><span class="hljs-string">"F9U0W9"</span></span>,
    "<span class="hljs-attribute">guid</span>": <span class="hljs-value"><span class="hljs-string">"a53e98e4-0197-4513-be6d-49836e406aaa"</span>
</span>}
</code></pre>
<p>Response body</p>
<pre><code><span class="hljs-deletion">-</span>
</code></pre><p>Request sample</p>
<pre><code>curl -v -X POST https://pki.virgilsecurity.com/objects/user-data/<span class="hljs-number">6480</span>ba7a-<span class="hljs-number">1</span>b68-<span class="hljs-number">141</span><span class="hljs-literal">e</span>-b547-ef8d9adc3145/actions/confirm --data '{<span class="hljs-string">"guid"</span>: <span class="hljs-string">"a53e98e4-0197-4513-be6d-49836e406aaa"</span>, <span class="hljs-string">"code"</span>:<span class="hljs-string">"F9U0W9"</span>}'
</code></pre><h2 id="post-objects-user-data-user-data-id-actions-resend-confirmation">POST /objects/user-data/{user-data-id}/actions/resend-confirmation</h2>
<p>Resend the <strong><code>UserData</code></strong>&#39;s confirmation code</p>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">POST</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">https</span>:</span><span class="hljs-comment">//pki.virgilsecurity.com/objects/user-data/{user-data-id}/actions/resend-confirmation</span>
Authorization          Needed
</code></pre><p>Request body</p>
<pre><code class="lang-json">{
    "<span class="hljs-attribute">guid</span>": <span class="hljs-value"><span class="hljs-string">"a53e98e4-0197-4513-be6d-49836e406aaa"</span>
</span>}
</code></pre>
<p>Response body</p>
<pre><code><span class="hljs-deletion">-</span>
</code></pre><p>Request sample</p>
<pre><code>curl -v -<span class="hljs-constant">X POST </span><span class="hljs-symbol">https:</span>/<span class="hljs-regexp">/pki.virgilsecurity.com/objects</span><span class="hljs-regexp">/user-data/</span><span class="hljs-number">6480</span>ba7a-<span class="hljs-number">1</span>b68-<span class="hljs-number">141</span>e-b547-ef8d9adc3145/actions/resend-confirmation --data <span class="hljs-string">'{"guid": "a53e98e4-0197-4513-be6d-49836e406aaa"}'</span>
</code></pre><h2 id="pki-search">Search</h2>
<ul>
<li><a href="#post-objectsaccountactionssearch">POST /objects/account/actions/search </a></li>
<li><a href="#post-objectsuser-dataactionssearch">POST /objects/user-data/actions/search </a></li>
</ul>
<h2 id="post-objects-account-actions-search">POST /objects/account/actions/search</h2>
<p>Retrieve <strong><code>Account</code></strong> entity by user data specified</p>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>    <span class="hljs-title">POST</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>            <span class="hljs-title">https</span>:</span><span class="hljs-comment">//pki.virgilsecurity.com/objects/account/actions/search</span>
Authorization          <span class="hljs-keyword">Not</span> Needed
</code></pre><p>Request body</p>
<pre><code class="lang-json">{
    "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"test@test.com"</span>
</span>}
</code></pre>
<p>Response body</p>
<pre><code class="lang-json">[
    {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"981d9537-3cc1-1236-6d63-8a7a608f572f"</span></span>,
        }</span>,
        "<span class="hljs-attribute">public_keys</span>":<span class="hljs-value">[
            {
                "<span class="hljs-attribute">id</span>":<span class="hljs-value">{
                    "<span class="hljs-attribute">account_id</span>": <span class="hljs-value"><span class="hljs-string">"dfb37d22-5995-bf14-46d8-0202a20f32de"</span></span>,
                    "<span class="hljs-attribute">public_key_id</span>": <span class="hljs-value"><span class="hljs-string">"75a152b8-022d-6137-3f1a-dc0353639fe8"</span>
                </span>}</span>,
                "<span class="hljs-attribute">public_key</span>":<span class="hljs-value"><span class="hljs-string">"tkjvnerovgboiej9u5gj4b0best"</span>
            </span>}
        ]
    </span>}
]
</code></pre>
<p>Request sample</p>
<pre><code><span class="hljs-title">curl</span> -v -X POST <span class="hljs-url">https://pki.virgilsecurity.com/objects/account/actions/search</span> --data <span class="hljs-string">'{"email": "test<span class="hljs-variable">@test</span>.com"}'</span>
</code></pre><h2 id="post-objects-user-data-actions-search">POST /objects/user-data/actions/search</h2>
<p>Retrieve <strong><code>UserData</code></strong> entity by value specified</p>
<p>Request info</p>
<pre><code>HTTP Request <span class="hljs-function"><span class="hljs-keyword">method</span>           <span class="hljs-title">POST</span>
<span class="hljs-title">Request</span> <span class="hljs-title">URL</span>                   <span class="hljs-title">https</span>:</span><span class="hljs-comment">//pki.virgilsecurity.com/objects/user-data/actions/search</span>
Authorization                 <span class="hljs-keyword">Not</span> Needed
Optional GET paramenters      ?expand=public_key
</code></pre><p>Request body</p>
<pre><code class="lang-json">{
    "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"user@virgilsecurity.com"</span>
</span>}
</code></pre>
<p>Response body without ?expand=public_key</p>
<pre><code class="lang-json">[
    {
        "<span class="hljs-attribute">id</span>":<span class="hljs-value">{
            "<span class="hljs-attribute">account_id</span>":<span class="hljs-value"><span class="hljs-string">"dfb37d22-5995-bf14-46d8-0202a20f32de"</span></span>,
            "<span class="hljs-attribute">public_key_id</span>":<span class="hljs-value"><span class="hljs-string">"75a152b8-022d-6137-3f1a-dc0353639fe8"</span></span>,
            "<span class="hljs-attribute">user_data_id</span>":<span class="hljs-value"><span class="hljs-string">"a4fc6c26-42fd-97bf-a054-0bc3341100c3"</span>
        </span>}</span>,
        "<span class="hljs-attribute">class</span>":<span class="hljs-value"><span class="hljs-string">"user_id"</span></span>,
        "<span class="hljs-attribute">type</span>":<span class="hljs-value"><span class="hljs-string">"email"</span></span>,
        "<span class="hljs-attribute">value</span>":<span class="hljs-value"><span class="hljs-string">"user@virgilsecurity.com"</span>
    </span>}
]
</code></pre>
<p>Response body with ?expand=public_key</p>
<pre><code class="lang-json">[
    {
        "<span class="hljs-attribute">id</span>":<span class="hljs-value">{
            "<span class="hljs-attribute">account_id</span>":<span class="hljs-value"><span class="hljs-string">"dfb37d22-5995-bf14-46d8-0202a20f32de"</span></span>,
            "<span class="hljs-attribute">public_key_id</span>":<span class="hljs-value"><span class="hljs-string">"75a152b8-022d-6137-3f1a-dc0353639fe8"</span></span>,
            "<span class="hljs-attribute">user_data_id</span>":<span class="hljs-value"><span class="hljs-string">"a4fc6c26-42fd-97bf-a054-0bc3341100c3"</span>
        </span>}</span>,
        "<span class="hljs-attribute">class</span>":<span class="hljs-value"><span class="hljs-string">"user_id"</span></span>,
        "<span class="hljs-attribute">type</span>":<span class="hljs-value"><span class="hljs-string">"email"</span></span>,
        "<span class="hljs-attribute">value</span>":<span class="hljs-value"><span class="hljs-string">"user@virgilsecurity.com"</span></span>,
        "<span class="hljs-attribute">expanded</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">public_key</span>":<span class="hljs-value">{
                "<span class="hljs-attribute">id</span>":<span class="hljs-value">{
                    "<span class="hljs-attribute">account_id</span>":<span class="hljs-value"><span class="hljs-string">"dfb37d22-5995-bf14-46d8-0202a20f32de"</span></span>,
                    "<span class="hljs-attribute">public_key_id</span>":<span class="hljs-value"><span class="hljs-string">"75a152b8-022d-6137-3f1a-dc0353639fe8"</span>
                </span>}</span>,
                "<span class="hljs-attribute">public_key</span>":<span class="hljs-value"><span class="hljs-string">"tkjvnerovgboiej9u5gj4b0best"</span>
            </span>}
        </span>}
    </span>}
]
</code></pre>
<p>Request sample</p>
<pre><code>curl -<span class="hljs-keyword">v</span> -<span class="hljs-keyword">X</span> POST http<span class="hljs-variable">s:</span>//pki.virgilsecurity.<span class="hljs-keyword">com</span>/objects/user-data/actions/<span class="hljs-built_in">search</span>\?<span class="hljs-built_in">expand</span>\=public_key --data <span class="hljs-string">'{"email": "user@virgilsecurity.com"}'</span>
</code></pre><h2 id="pki-error-codes">Error Codes</h2>
<p>Application uses standard HTTP response codes:</p>
<pre><code><span class="hljs-number">200</span> - Success
<span class="hljs-number">400</span> - Request error
<span class="hljs-number">401</span> - Authorization error
<span class="hljs-number">404</span> - Entity <span class="hljs-keyword">not</span> found
<span class="hljs-number">405</span> - <span class="hljs-function"><span class="hljs-keyword">Method</span> <span class="hljs-title">not</span> <span class="hljs-title">allowed</span>
500 - <span class="hljs-title">Server</span> <span class="hljs-title">error</span></span>
</code></pre><p>Addititional information about the error is returned as JSON-object like:</p>
<pre><code><span class="hljs-collection">{
    <span class="hljs-string">"error"</span>: <span class="hljs-collection">{
        <span class="hljs-string">"code"</span>: <span class="hljs-collection">{error-code}</span>
    }</span>
}</span>
</code></pre><p><strong><code>HTTP 500. Server error</code></strong> status is returned on internal application errors</p>
<pre><code><span class="hljs-number">10000</span> - Internal <span class="hljs-type">application</span> <span class="hljs-keyword">error</span>
<span class="hljs-number">10001</span> - Application kernel <span class="hljs-keyword">error</span>
<span class="hljs-number">10010</span> - Internal <span class="hljs-type">application</span> <span class="hljs-keyword">error</span>
<span class="hljs-number">10011</span> - Internal <span class="hljs-type">application</span> <span class="hljs-keyword">error</span>
<span class="hljs-number">10012</span> - Internal <span class="hljs-type">application</span> <span class="hljs-keyword">error</span>
<span class="hljs-number">10100</span> - JSON specified <span class="hljs-keyword">as</span> a request body <span class="hljs-keyword">is</span> invalid
</code></pre><p><strong><code>HTTP 401. Auth error</code></strong> status is returned on authorization errors</p>
<pre><code><span class="hljs-number">10200</span> - Guid specified <span class="hljs-keyword">is</span> expired already
<span class="hljs-number">10201</span> - The Guid specified <span class="hljs-keyword">is</span> invalid
<span class="hljs-number">10202</span> - The Authorization header was <span class="hljs-keyword">not</span> specified
<span class="hljs-number">10203</span> - <span class="hljs-keyword">Public</span> <span class="hljs-keyword">key</span> header <span class="hljs-keyword">not</span> specified <span class="hljs-keyword">or</span> incorrect
<span class="hljs-number">10204</span> - The signed digest specified <span class="hljs-keyword">is</span> incorrect
</code></pre><p><strong><code>HTTP 400. Request error</code></strong> status is returned on request data validation errors</p>
<pre><code><span class="hljs-number">20000</span> - Account <span class="hljs-built_in">object</span> <span class="hljs-keyword">not</span> found <span class="hljs-keyword">for</span> id specified
<span class="hljs-number">20100</span> - <span class="hljs-keyword">Public</span> <span class="hljs-keyword">key</span> <span class="hljs-built_in">object</span> <span class="hljs-keyword">not</span> found <span class="hljs-keyword">for</span> id specified
<span class="hljs-number">20101</span> - <span class="hljs-keyword">Public</span> <span class="hljs-keyword">key</span> invalid
<span class="hljs-number">20102</span> - <span class="hljs-keyword">Public</span> <span class="hljs-keyword">key</span> <span class="hljs-keyword">not</span> specified
<span class="hljs-number">20103</span> - <span class="hljs-keyword">Public</span> <span class="hljs-keyword">key</span> must be base64-encoded <span class="hljs-built_in">string</span>
<span class="hljs-number">20200</span> - UserData <span class="hljs-built_in">object</span> <span class="hljs-keyword">not</span> found <span class="hljs-keyword">for</span> id specified
<span class="hljs-number">20201</span> - UserData type specified <span class="hljs-keyword">is</span> invalid
<span class="hljs-number">20202</span> - UserData type specified <span class="hljs-keyword">for</span> user identity <span class="hljs-keyword">is</span> invalid
<span class="hljs-number">20203</span> - Domain specified <span class="hljs-keyword">for</span> domain identity <span class="hljs-keyword">is</span> invalid
<span class="hljs-number">20204</span> - Email specified <span class="hljs-keyword">for</span> email identity <span class="hljs-keyword">is</span> invalid
<span class="hljs-number">20205</span> - Phone specified <span class="hljs-keyword">for</span> phone identity <span class="hljs-keyword">is</span> invalid
<span class="hljs-number">20206</span> - Fax specified <span class="hljs-keyword">for</span> fax identity <span class="hljs-keyword">is</span> invalid
<span class="hljs-number">20207</span> - Application specified <span class="hljs-keyword">for</span> application identity <span class="hljs-keyword">is</span> invalid
<span class="hljs-number">20208</span> - Mac address specified <span class="hljs-keyword">for</span> mac address identity <span class="hljs-keyword">is</span> invalid
<span class="hljs-number">20210</span> - UserData integrity constraint violation
<span class="hljs-number">20211</span> - UserData confirmation entity <span class="hljs-keyword">not</span> found <span class="hljs-keyword">by</span> code specified
<span class="hljs-number">20212</span> - UserData confirmation code invalid
<span class="hljs-number">20213</span> - UserData was already confirmed <span class="hljs-keyword">and</span> does <span class="hljs-keyword">not</span> need further confirmation
<span class="hljs-number">20214</span> - UserData <span class="hljs-keyword">class</span> specified <span class="hljs-keyword">is</span> invalid
<span class="hljs-number">20300</span> - User info data validation failed. Name <span class="hljs-keyword">is</span> invalid
</code></pre>
  </div>

  <div class="api-pki api-docs" id="private-keys-api">
<h1 id="virgilkeyring-restful-service">Private Keys Management API</h1>
<p>RESTful service for private keys managing</p>
<h2 id="keyring-authentication">Authentication</h2>
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
</code></pre><h1 id="keyring-private-keys">Private Keys</h1>
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
</code></pre><h1 id="keyring-account">Account</h1>
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
</code></pre><h2 id="keyring-error-codes">Error Codes</h2>
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
</code></pre>

  </div>

  <div class="api-crypto api-docs" id="api-virgil-crypt">
  </div>

  </div>

      </section>

      <section class="code-tabs container hide" data-tab="samples">
          <div class="code-tabs-nav">
              <img class="code-tabs-dots" src="/img/docs/window-dots.png" alt="dots.." />            
              <button class="code-tabs-nav-item" data-section="csharp">C#</button>
              <button class="code-tabs-nav-item" data-section="cpp">C++</button>
              <button class="code-tabs-nav-item" data-section="php">PHP</button>
          </div>

          <div class="code-tabs-subnav">
              <button class="code-tabs-nav-item code-tabs-subnav-item" data-code-tab="generate-keys">Generate Keys</button>
              <button class="code-tabs-nav-item code-tabs-subnav-item" data-code-tab="encrypt">Encrypt</button>
              <button class="code-tabs-nav-item code-tabs-subnav-item" data-code-tab="decrypt">Decrypt</button>
              <button class="code-tabs-nav-item code-tabs-subnav-item" data-code-tab="sign">Sign</button>
              <button class="code-tabs-nav-item code-tabs-subnav-item" data-code-tab="verify">Verify</button>
              <button class="code-tabs-nav-item code-tabs-subnav-item" data-code-tab="register-user">Register User (PKI)</button>
              <button class="code-tabs-nav-item code-tabs-subnav-item" data-code-tab="get-public-key">Get Public Key (PKI)</button>
          </div>

          <div class="sections">
                  <div class="section" data-section="csharp">
              <pre data-code-tab="generate-keys">
                  <code class="lang-csharp">
  using System;
  using System.IO;
  using System.Text;

  namespace Virgil.Samples
  {
      class GenerateKeys
      {
          public static void Run()
          {
              Console.WriteLine("Generate keys with with password: 'password'");
              var virgilKeyPair = new VirgilKeyPair(Encoding.UTF8.GetBytes("password"));

              Console.WriteLine("Store public key: public.key ...");
              using (var fileStream = File.Create("public.key"))
              {
                  byte[] publicKey = virgilKeyPair.PublicKey();
                  fileStream.Write(publicKey, 0, publicKey.Length);
              }

              Console.WriteLine("Store private key: private.key ...");
              using (var fileStream = File.Create("private.key"))
              {
                  byte[] privateKey = virgilKeyPair.PrivateKey();
                  fileStream.Write(privateKey, 0, privateKey.Length);
              }
          }
      }
  }
                  </code>
              </pre>            
              <pre data-code-tab="encrypt">
                  <code class="lang-csharp">
  using System;
  using System.IO;

  namespace Virgil.Samples
  {
      class EncryptSample
      {
          public static void Run()
          {
              Console.WriteLine("Prepare input file: test.txt...");

              using (var input = File.OpenRead("test.txt"))
              {
                  Console.WriteLine("Prepare output file: test.txt.enc...");

                  using (var output = File.Create("test.txt.enc"))
                  {
                      Console.WriteLine("Initialize cipher...");
                      var virgilStreamCipher = new VirgilStreamCipher();

                      Console.WriteLine("Get recipient (" + Program.UserId + ") information from the Virgil PKI service...");
                      var virgilPublicKey = Program.GetPkiPublicKey(Program.UserIdType, Program.UserId);

                      Console.WriteLine("Add recipient...");
                      virgilStreamCipher.AddKeyRecipient(virgilPublicKey.Id().CertificateId(),
                          virgilPublicKey.PublicKey());

                      Console.WriteLine("Encrypt and store results...");

                      var source = new StreamSource(input);
                      var sink = new StreamSink(output);

                      virgilStreamCipher.Encrypt(source, sink, true);

                      Console.WriteLine("Encrypted data is successfully stored in the output file...");
                  }
              }
          }
      }
  }
                  </code>
              </pre>            
              <pre data-code-tab="decrypt">
                  <code class="lang-csharp">
  using System;
  using System.IO;
  using System.Text;

  namespace Virgil.Samples
  {
      class DecryptSample
      {
          public static void Run()
          {
              Console.WriteLine("Prepare input file: test.txt.enc...");

              using (var input = File.OpenRead("test.txt.enc"))
              {
                  Console.WriteLine("Prepare output file: decrypted_test.txt...");

                  using (var output = File.Create("decrypted_test.txt"))
                  {
                      Console.WriteLine("Initialize cipher...");
                      var virgilStreamCipher = new VirgilStreamCipher();

                      Console.WriteLine("Read virgil public key...");
                      var publicKeyBytes = File.ReadAllBytes("virgil_public.key");
                      var virgilPublicKey = new VirgilCertificate();
                      virgilPublicKey.FromAsn1(publicKeyBytes);

                      Console.WriteLine("Read private key...");

                      var privateKey = File.ReadAllBytes("private.key");

                      Console.WriteLine("Decrypt...");

                      var source = new StreamSource(input);
                      var sink = new StreamSink(output);
                      byte[] password = Encoding.UTF8.GetBytes("password");

                      virgilStreamCipher.DecryptWithKey(source, sink, virgilPublicKey.Id().CertificateId(),
                          privateKey, password);

                      Console.WriteLine("Decrypted data is successfully stored in the output file...");
                  }
              }
          }
      }
  }
                  </code>
              </pre>            
              <pre data-code-tab="sign">
                  <code class="lang-csharp">
  using System;
  using System.IO;
  using System.Text;

  namespace Virgil.Samples
  {
      class SignSample
      {
          public static void Run()
          {
              Console.WriteLine("Prepare input file: test.txt...");

              using (var input = File.OpenRead("test.txt"))
              {
                  Console.WriteLine("Prepare output file: test.txt.sign...");

                  using (var output = File.Create("test.txt.sign"))
                  {
                      Console.WriteLine("Read virgil public key...");
                      var publicKeyBytes = File.ReadAllBytes("virgil_public.key");
                      var virgilPublicKey = new VirgilCertificate();
                      virgilPublicKey.FromAsn1(publicKeyBytes);

                      Console.WriteLine("Read private key...");

                      var privateKey = File.ReadAllBytes("private.key");

                      Console.WriteLine("Initialize signer...");

                      var signer = new VirgilStreamSigner();
                          
                      byte[] password = Encoding.UTF8.GetBytes("password");

                      Console.WriteLine("Sign data...");

                      var source = new StreamSource(input);

                      VirgilSign sign = signer.Sign(source, virgilPublicKey.Id().CertificateId(), privateKey, password);

                      Console.WriteLine("Save sign...");
                      var asn1Sign = sign.ToAsn1();
                      output.Write(asn1Sign, 0, asn1Sign.Length);

                      Console.WriteLine("Sign is successfully stored in the output file.");
                  }
              }
          }
      }
  }
                  </code>
              </pre>            
              <pre data-code-tab="verify">
                  <code class="lang-csharp">
  using System;
  using System.IO;

  namespace Virgil.Samples
  {
      class VerifySample
      {
          public static void Run()
          {
              Console.WriteLine("Prepare input file: test.txt...");

              using (var input = File.OpenRead("test.txt"))
              {
                  Console.WriteLine("Read virgil sign...");

                  using (var signStream = File.OpenRead("test.txt.sign"))
                  {
                      var signBytes = new byte[signStream.Length];
                      signStream.Read(signBytes, 0, signBytes.Length);

                      var virgilSign = new VirgilSign();
                      virgilSign.FromAsn1(signBytes);

                      Console.WriteLine("Get signer (" + Program.SignerId + ") information from the Virgil PKI service...");

                      VirgilCertificate virgilPublicKey = Program.GetPkiPublicKey(Program.UserIdType, Program.SignerId);

                      Console.WriteLine("Initialize verifier...");

                      var signer = new VirgilStreamSigner();

                      Console.WriteLine("Verify data...");
                      var dataSource = new StreamSource(input);
                      bool verified = signer.Verify(dataSource, virgilSign, virgilPublicKey.PublicKey());

                      Console.WriteLine("Data is " + (verified ? "" : "not ") + "verified!");
                  }
              }
          }
      }
  }
                  </code>
              </pre>            
              <pre data-code-tab="register-user">
                  <code class="lang-csharp">
  using System;
  using System.IO;

  namespace Virgil.Samples
  {
      class RegisterUser
      {
          public static void Run()
          {
              Console.WriteLine("Prepare input file: public.key...");
              using (var inFile = File.OpenRead("public.key"))
              {
                  Console.WriteLine("Prepare output file: virgil_public.key...");
                  using (var outFile = File.Create("virgil_public.key"))
                  {
                      var publicKey = new byte[inFile.Length];
                      inFile.Read(publicKey, 0, (int) inFile.Length);

                      Console.WriteLine("Create user ({0}) account on the Virgil PKI service...", Program.UserId);
                      VirgilCertificate virgilPublicKey = Program.CreateUser(publicKey, Program.UserIdType, Program.UserId);

                      Console.WriteLine("Store virgil public key to the output file...");

                      byte[] virgilPublickKeyBytes = virgilPublicKey.ToAsn1();
                      outFile.Write(virgilPublickKeyBytes, 0, virgilPublickKeyBytes.Length);
                  }
              }
          }
      }
  }
                  </code>
              </pre>
              <pre data-code-tab="get-public-key">
                  <code class="lang-csharp">
  using System;
  using System.IO;

  namespace Virgil.Samples
  {
      class GetPublicKey
      {
          public static void Run()
          {
              Console.WriteLine("Get user ({0}) information from the Virgil PKI service...", Program.UserId);
              var virgilPublicKey = Program.GetPkiPublicKey(Program.UserIdType, Program.UserId);

              Console.WriteLine("Prepare output file: virgil_public.key...");
              using (var outFile = File.Create("virgil_public.key"))
              {
                  Console.WriteLine("Store virgil public key to the output file...");

                  byte[] virgilPublickKeyBytes = virgilPublicKey.ToAsn1();
                  outFile.Write(virgilPublickKeyBytes, 0, virgilPublickKeyBytes.Length);
              }
          }
      }
  }
                  </code>
              </pre>
          </div>
              <div class="section" data-section="cpp">
                  <pre data-code-tab="generate-keys">
                      <code class="lang-cpp">
  #include &lt;fstream&gt;
  #include &lt;algorithm&gt;
  #include &lt;iterator&gt;
  #include &lt;string&gt;
  #include &lt;stdexcept&gt;

  #include &lt;virgil/VirgilByteArray.h&gt;
  using virgil::VirgilByteArray;
  #include &lt;virgil/service/data/VirgilKeyPair.h&gt;
  using virgil::service::data::VirgilKeyPair;

  int main(int argc, char **argv) {
      try {
          std::cout << "Generate keys with with password: 'password'" << std::endl;
          VirgilKeyPair newKeyPair(virgil::str2bytes("password"));

          std::cout << "Store public key: new_public.key ..." << std::endl;
          std::ofstream publicKeyStream("new_public.key", std::ios::out | std::ios::binary);
          if (!publicKeyStream.good()) {
              throw std::runtime_error("can not write file: new_public.key");
          }
          VirgilByteArray publicKey = newKeyPair.publicKey();
          std::copy(publicKey.begin(), publicKey.end(), std::ostreambuf_iterator<char>(publicKeyStream));

          std::cout << "Store private key: new_private.key ..." << std::endl;
          std::ofstream privateKeyStream("new_private.key", std::ios::out | std::ios::binary);
          if (!privateKeyStream.good()) {
              throw std::runtime_error("can not write file: new_private.key");
          }
          VirgilByteArray privateKey = newKeyPair.privateKey();
          std::copy(privateKey.begin(), privateKey.end(), std::ostreambuf_iterator<char>(privateKeyStream));
      } catch (std::exception& exception) {
          std::cerr << "Error: " << exception.what() << std::endl;
      }
      return 0;
  }
                  </code>
              </pre>
              <pre data-code-tab="register-user" >
                  <code class="lang-cpp" >
  #include &lt;iostream&gt;
  #include &lt;fstream&gt;
  #include &lt;algorithm&gt;
  #include &lt;iterator&gt;
  #include &lt;string&gt;
  #include &lt;stdexcept&gt;
  #include &lt;map&gt;

  #include &lt;virgil/VirgilByteArray.h&gt;
  using virgil::VirgilByteArray;
  #include &lt;virgil/VirgilException.h&gt;
  using virgil::VirgilException;
  #include &lt;virgil/service/data/VirgilCertificate.h&gt;
  using virgil::service::data::VirgilCertificate;
  #include &lt;virgil/crypto/VirgilBase64.h&gt;
  using virgil::crypto::VirgilBase64;

  #include &lt;curl/curl.h&gt;
  #include &lt;json/json.h&gt;

  #define VIRGIL_PKI_URL_BASE "https://pki.virgilsecurity.com/"
  #define USER_ID_TYPE "email"
  #define USER_ID "test.virgilsecurity@mailinator.com"

  #define MAKE_URL(base, path) (base path)

  static int pki_callback(char *data, size_t size, size_t nmemb, std::string *buffer_in) {
      // Is there anything in the buffer?
      if (buffer_in != NULL) {
          // Append the data to the buffer
          buffer_in->append(data, size * nmemb);
          return size * nmemb;
      }
      return 0;
  }

  static std::string pki_post(const std::string& url, const std::string& json) {
      CURL *curl = NULL;
      CURLcode result = CURLE_OK;
      struct curl_slist *headers = NULL;
      std::string response;

      /* In windows, this will init the winsock stuff */
      curl_global_init(CURL_GLOBAL_ALL);

      /* get a curl handle */
      curl = curl_easy_init();
      if (curl) {
          /* set content type */
          headers = curl_slist_append(headers, "Accept: application/json");
          headers = curl_slist_append(headers, "Content-Type: application/json");
          /* Set the URL */
          curl_easy_setopt(curl, CURLOPT_URL, url.c_str());
          /* Now specify the POST data */
          curl_easy_setopt(curl, CURLOPT_CUSTOMREQUEST, "POST");
          curl_easy_setopt(curl, CURLOPT_HTTPHEADER, headers);

          curl_easy_setopt(curl, CURLOPT_COPYPOSTFIELDS, json.c_str());

          curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, pki_callback);
          curl_easy_setopt(curl, CURLOPT_WRITEDATA, (void *)(&response));

          /* Perform the request, result will get the return code */
          result = curl_easy_perform(curl);

          /* free headers */
          curl_slist_free_all(headers);

          /* cleanup curl handle */
          curl_easy_cleanup(curl);
      }
      curl_global_cleanup();

      /* Check for errors */
      if (result == CURLE_OK) {
          return response;
      } else {
          throw std::runtime_error(std::string("cURL failed with error: ") + curl_easy_strerror(result));
      }
  }

  VirgilCertificate
  pki_create_user(const VirgilByteArray& publicKey, const std::map<std::string, std::string>& ids) {
      // Create request
      Json::Value payload;
      payload["public_key"] = VirgilBase64::encode(publicKey);
      Json::Value userData(Json::arrayValue);
      for (std::map<std::string, std::string>::const_iterator id = ids.begin(); id != ids.end(); ++id) {
          Json::Value data(Json::objectValue);
          data["class"] = "user_id";
          data["type"] = id->first;
          data["value"] = id->second;
          userData.append(data);
      }
      payload["user_data"] = userData;
      // Perform request
      std::string response = pki_post(MAKE_URL(VIRGIL_PKI_URL_BASE, "objects/public-key"),
              Json::FastWriter().write(payload));
      // Parse response
      Json::Reader reader(Json::Features::strictMode());
      Json::Value responseObject;
      if (!reader.parse(response, responseObject)) {
          throw VirgilException(reader.getFormattedErrorMessages());
      }
      const Json::Value& accountIdObject = responseObject["id"]["account_id"];
      const Json::Value& publicKeyIdObject = responseObject["id"]["public_key_id"];

      if (accountIdObject.isString() && publicKeyIdObject.isString()) {
          VirgilCertificate virgilPublicKey(publicKey);
          virgilPublicKey.id().setAccountId(virgil::str2bytes(accountIdObject.asString()));
          virgilPublicKey.id().setCertificateId(virgil::str2bytes(publicKeyIdObject.asString()));
          return virgilPublicKey;
      } else {
          throw std::runtime_error(std::string("Unexpected response format:\n") + responseObject.toStyledString());
      }
  }

  int main() {
      try {
          std::cout << "Prepare input file: public.key..." << std::endl;
          std::ifstream inFile("public.key", std::ios::in | std::ios::binary);
          if (!inFile.good()) {
              throw std::runtime_error("can not read file: public.key");
          }

          std::cout << "Prepare output file: virgil_public.key..." << std::endl;
          std::ofstream outFile("virgil_public.key", std::ios::out | std::ios::binary);
          if (!outFile.good()) {
              throw std::runtime_error("can not write file: virgil_public.key");
          }

          std::cout << "Read public key..." << std::endl;
          VirgilByteArray publicKey;
          std::copy(std::istreambuf_iterator<char>(inFile), std::istreambuf_iterator<char>(),
                  std::back_inserter(publicKey));

          std::cout << "Create user (" << USER_ID << ") account on the Virgil PKI service..." << std::endl;
          std::map<std::string, std::string> userIds;
          userIds[USER_ID_TYPE] = USER_ID;
          VirgilCertificate virgilPublicKey = pki_create_user(publicKey, userIds);

          std::cout << "Store virgil public key to the output file..." << std::endl;
          VirgilByteArray virgilPublicKeyData = virgilPublicKey.toAsn1();
          std::copy(virgilPublicKeyData.begin(), virgilPublicKeyData.end(), std::ostreambuf_iterator<char>(outFile));
      } catch (std::exception& exception) {
          std::cerr << "Error: " << exception.what() << std::endl;
      }
      return 0;
  }
                  </code>
              </pre>
              <pre data-code-tab="get-public-key">
                  <code class="lang-cpp" >
  #include &lt;cstddef&gt;
  #include &lt;iostream&gt;
  #include &lt;fstream&gt;
  #include &lt;algorithm&gt;
  #include &lt;iterator&gt;
  #include &lt;string&gt;
  #include &lt;stdexcept&gt;

  #include &lt;virgil/VirgilByteArray.h&gt;
  using virgil::VirgilByteArray;
  #include &lt;virgil/service/data/VirgilCertificate.h&gt;
  using virgil::service::data::VirgilCertificate;
  #include &lt;virgil/crypto/VirgilBase64.h&gt;
  using virgil::crypto::VirgilBase64;

  #include &lt;curl/curl.h&gt;
  #include &lt;json/json.h&gt;

  #define VIRGIL_PKI_URL_BASE "https://pki.virgilsecurity.com/"
  #define USER_ID_TYPE "email"
  #define USER_ID "test.virgilsecurity@mailinator.com"

  #define MAKE_URL(base, path) (base path)

  static int pki_callback(char *data, size_t size, size_t nmemb, std::string *buffer_in) {
      // Is there anything in the buffer?
      if (buffer_in != NULL) {
          // Append the data to the buffer
          buffer_in->append(data, size * nmemb);
          return size * nmemb;
      }
      return 0;
  }

  static std::string pki_post(const std::string& url, const std::string& json) {
      CURL *curl = NULL;
      CURLcode result = CURLE_OK;
      struct curl_slist *headers = NULL;
      std::string response;

      /* In windows, this will init the winsock stuff */
      curl_global_init(CURL_GLOBAL_ALL);

      /* get a curl handle */
      curl = curl_easy_init();
      if (curl) {
          /* set content type */
          headers = curl_slist_append(headers, "Accept: application/json");
          headers = curl_slist_append(headers, "Content-Type: application/json");
          /* Set the URL */
          curl_easy_setopt(curl, CURLOPT_URL, url.c_str());
          /* Now specify the POST data */
          curl_easy_setopt(curl, CURLOPT_CUSTOMREQUEST, "POST");
          curl_easy_setopt(curl, CURLOPT_HTTPHEADER, headers);

          curl_easy_setopt(curl, CURLOPT_COPYPOSTFIELDS, json.c_str());

          curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, pki_callback);
          curl_easy_setopt(curl, CURLOPT_WRITEDATA, (void *)(&response));

          /* Perform the request, result will get the return code */
          result = curl_easy_perform(curl);

          /* free headers */
          curl_slist_free_all(headers);

          /* cleanup curl handle */
          curl_easy_cleanup(curl);
      }
      curl_global_cleanup();

      /* Check for errors */
      if (result == CURLE_OK) {
          return response;
      } else {
          throw std::runtime_error(std::string("cURL failed with error: ") + curl_easy_strerror(result));
      }
  }

  VirgilCertificate pki_get_public_key(const std::string& userIdType, const std::string& userId) {
      // Create request
      Json::Value payload;
      payload[userIdType] = userId;
      // Perform request
      std::string response = pki_post(MAKE_URL(VIRGIL_PKI_URL_BASE, "objects/account/actions/search"),
              Json::FastWriter().write(payload));
      // Parse response
      Json::Reader reader(Json::Features::strictMode());
      Json::Value responseObject;
      if (!reader.parse(response, responseObject)) {
          throw std::runtime_error(reader.getFormattedErrorMessages());
      }
      const Json::Value& virgilPublicKeyObject = responseObject[0]["public_keys"][0];
      const Json::Value& idObject = virgilPublicKeyObject["id"]["public_key_id"];
      const Json::Value& publicKeyObject = virgilPublicKeyObject["public_key"];

      if (idObject.isString() && publicKeyObject.isString()) {
          VirgilCertificate virgilPublicKey(VirgilBase64::decode(publicKeyObject.asString()));
          virgilPublicKey.id().setCertificateId(virgil::str2bytes(idObject.asString()));
          return virgilPublicKey;
      } else {
          throw std::runtime_error(std::string("virgil public key for recipient '") + userId +
                  "' of type '" + userIdType + "' not found");
      }
  }

  int main() {
      try {
          std::cout << "Get user ("<< USER_ID << ") information from the Virgil PKI service..." << std::endl;
          VirgilCertificate virgilPublicKey = pki_get_public_key(USER_ID_TYPE, USER_ID);

          std::cout << "Prepare output file: virgil_public.key..." << std::endl;
          std::ofstream outFile("virgil_public.key", std::ios::out | std::ios::binary);
          if (!outFile.good()) {
              throw std::runtime_error("can not write file: virgil_public.key");
          }

          std::cout << "Store virgil public key to the output file..." << std::endl;
          VirgilByteArray virgilPublicKeyData = virgilPublicKey.toAsn1();
          std::copy(virgilPublicKeyData.begin(), virgilPublicKeyData.end(), std::ostreambuf_iterator<char>(outFile));
      } catch (std::exception& exception) {
          std::cerr << "Error: " << exception.what() << std::endl;
      }
      return 0;
  }
                  </code>
              </pre>
              <pre data-code-tab="encrypt">
                  <code class="lang-cpp">
  #include &lt;cstddef&gt;
  #include &lt;iostream&gt;
  #include &lt;fstream&gt;
  #include &lt;algorithm&gt;
  #include &lt;iterator&gt;
  #include &lt;string&gt;
  #include &lt;stdexcept&gt;

  #include &lt;virgil/VirgilByteArray.h&gt;
  using virgil::VirgilByteArray;
  #include &lt;virgil/service/data/VirgilCertificate.h&gt;
  using virgil::service::data::VirgilCertificate;
  #include &lt;virgil/service/VirgilStreamCipher.h&gt;
  using virgil::service::VirgilStreamCipher;
  #include &lt;virgil/stream/VirgilStreamDataSource.h&gt;
  using virgil::stream::VirgilStreamDataSource;
  #include &lt;virgil/stream/VirgilStreamDataSink.h&gt;
  using virgil::stream::VirgilStreamDataSink;
  #include &lt;virgil/crypto/VirgilBase64.h&gt;
  using virgil::crypto::VirgilBase64;

  #include &lt;curl/curl.h&gt;
  #include &lt;json/json.h&gt;

  #define VIRGIL_PKI_URL_BASE "https://pki.virgilsecurity.com/"
  #define USER_ID_TYPE "email"
  #define USER_ID "test.virgilsecurity@mailinator.com"

  #define MAKE_URL(base, path) (base path)

  static int pki_callback(char *data, size_t size, size_t nmemb, std::string *buffer_in) {
      // Is there anything in the buffer?
      if (buffer_in != NULL) {
          // Append the data to the buffer
          buffer_in->append(data, size * nmemb);
          return size * nmemb;
      }
      return 0;
  }

  static std::string pki_post(const std::string& url, const std::string& json) {
      CURL *curl = NULL;
      CURLcode result = CURLE_OK;
      struct curl_slist *headers = NULL;
      std::string response;

      /* In windows, this will init the winsock stuff */
      curl_global_init(CURL_GLOBAL_ALL);

      /* get a curl handle */
      curl = curl_easy_init();
      if (curl) {
          /* set content type */
          headers = curl_slist_append(headers, "Accept: application/json");
          headers = curl_slist_append(headers, "Content-Type: application/json");
          /* Set the URL */
          curl_easy_setopt(curl, CURLOPT_URL, url.c_str());
          /* Now specify the POST data */
          curl_easy_setopt(curl, CURLOPT_CUSTOMREQUEST, "POST");
          curl_easy_setopt(curl, CURLOPT_HTTPHEADER, headers);

          curl_easy_setopt(curl, CURLOPT_COPYPOSTFIELDS, json.c_str());

          curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, pki_callback);
          curl_easy_setopt(curl, CURLOPT_WRITEDATA, (void *)(&response));

          /* Perform the request, result will get the return code */
          result = curl_easy_perform(curl);

          /* free headers */
          curl_slist_free_all(headers);

          /* cleanup curl handle */
          curl_easy_cleanup(curl);
      }
      curl_global_cleanup();

      /* Check for errors */
      if (result == CURLE_OK) {
          return response;
      } else {
          throw std::runtime_error(std::string("cURL failed with error: ") + curl_easy_strerror(result));
      }
  }

  VirgilCertificate pki_get_public_key(const std::string& userIdType, const std::string& userId) {
      // Create request
      Json::Value payload;
      payload[userIdType] = userId;
      // Perform request
      std::string response = pki_post(MAKE_URL(VIRGIL_PKI_URL_BASE, "objects/account/actions/search"),
              Json::FastWriter().write(payload));
      // Parse response
      Json::Reader reader(Json::Features::strictMode());
      Json::Value responseObject;
      if (!reader.parse(response, responseObject)) {
          throw std::runtime_error(reader.getFormattedErrorMessages());
      }
      const Json::Value& virgilPublicKeyObject = responseObject[0]["public_keys"][0];
      const Json::Value& idObject = virgilPublicKeyObject["id"]["public_key_id"];
      const Json::Value& publicKeyObject = virgilPublicKeyObject["public_key"];

      if (idObject.isString() && publicKeyObject.isString()) {
          VirgilCertificate virgilPublicKey(VirgilBase64::decode(publicKeyObject.asString()));
          virgilPublicKey.id().setCertificateId(virgil::str2bytes(idObject.asString()));
          return virgilPublicKey;
      } else {
          throw std::runtime_error(std::string("virgil public key for recipient '") + userId +
                  "' of type '" + userIdType + "' not found");
      }
  }

  int main() {
      try {
          std::cout << "Prepare input file: test.txt..." << std::endl;
          std::ifstream inFile("test.txt", std::ios::in | std::ios::binary);
          if (!inFile.good()) {
              throw std::runtime_error("can not read file: test.txt");
          }

          std::cout << "Prepare output file: test.txt.enc..." << std::endl;
          std::ofstream outFile("test.txt.enc", std::ios::out | std::ios::binary);
          if (!outFile.good()) {
              throw std::runtime_error("can not write file: test.txt.enc");
          }

          std::cout << "Initialize cipher..." << std::endl;
          VirgilStreamCipher cipher;

          std::cout << "Get recipient ("<< USER_ID << ") information from the Virgil PKI service..." << std::endl;
          VirgilCertificate virgilPublicKey = pki_get_public_key(USER_ID_TYPE, USER_ID);
          std::cout << "Add recipient..." << std::endl;
          cipher.addKeyRecipient(virgilPublicKey.id().certificateId(), virgilPublicKey.publicKey());

          std::cout << "Encrypt and store results..." << std::endl;
          VirgilStreamDataSource dataSource(inFile);
          VirgilStreamDataSink dataSink(outFile);
          cipher.encrypt(dataSource, dataSink, true);

          std::cout << "Encrypted data is successfully stored in the output file..." << std::endl;
      } catch (std::exception& exception) {
          std::cerr << "Error: " << exception.what() << std::endl;
      }
      return 0;
  }
                  </code>
              </pre>
              <pre data-code-tab="decrypt" >
                  <code class="lang-cpp">
  #include &lt;iostream&gt;
  #include &lt;fstream&gt;
  #include &lt;algorithm&gt;
  #include &lt;iterator&gt;
  #include &lt;string&gt;
  #include &lt;stdexcept&gt;

  #include &lt;virgil/VirgilByteArray.h&gt;
  using virgil::VirgilByteArray;
  #include &lt;virgil/VirgilException.h&gt;
  using virgil::VirgilException;
  #include &lt;virgil/service/data/VirgilCertificate.h&gt;
  using virgil::service::data::VirgilCertificate;
  #include &lt;virgil/service/VirgilStreamCipher.h&gt;
  using virgil::service::VirgilStreamCipher;
  #include &lt;virgil/stream/VirgilStreamDataSource.h&gt;
  using virgil::stream::VirgilStreamDataSource;
  #include &lt;virgil/stream/VirgilStreamDataSink.h&gt;
  using virgil::stream::VirgilStreamDataSink;

  #include &lt;virgil/stream/utils.h&gt;

  int main() {
      try {
          std::cout << "Prepare input file: test.txt.enc..." << std::endl;
          std::ifstream inFile("test.txt.enc", std::ios::in | std::ios::binary);
          if (!inFile.good()) {
              throw std::runtime_error("can not read file: test.txt.enc");
          }

          std::cout << "Prepare output file: decrypted_test.txt..." << std::endl;
          std::ofstream outFile("decrypted_test.txt", std::ios::out | std::ios::binary);
          if (!outFile.good()) {
              throw std::runtime_error("can not write file: decrypted_test.txt");
          }

          std::cout << "Initialize cipher..." << std::endl;
          VirgilStreamCipher cipher;

          std::cout << "Read virgil public key..." << std::endl;
          VirgilCertificate virgilPublicKey = virgil::stream::read_certificate("virgil_public.key");

          std::cout << "Read private key..." << std::endl;
          std::ifstream keyFile("private.key", std::ios::in | std::ios::binary);
          if (!keyFile.good()) {
              throw std::runtime_error("can not read private key: private.key");
          }
          VirgilByteArray privateKey;
          std::copy(std::istreambuf_iterator<char>(keyFile), std::istreambuf_iterator<char>(),
                  std::back_inserter(privateKey));
          VirgilByteArray privateKeyPassword = virgil::str2bytes("password");

          std::cout << "Decrypt..." << std::endl;
          VirgilStreamDataSource dataSource(inFile);
          VirgilStreamDataSink dataSink(outFile);
          cipher.decryptWithKey(dataSource, dataSink, virgilPublicKey.id().certificateId(),
                  privateKey, privateKeyPassword);
          std::cout << "Decrypted data is successfully stored in the output file..." << std::endl;
      } catch (std::exception& exception) {
          std::cerr << "Error: " << exception.what() << std::endl;
      }
      return 0;
  }
                  </code>
              </pre>
              <pre data-code-tab="sign">
                  <code class="lang-cpp">
  #include &lt;iostream&gt;
  #include &lt;fstream&gt;
  #include &lt;algorithm&gt;
  #include &lt;iterator&gt;
  #include &lt;string&gt;
  #include &lt;stdexcept&gt;

  #include &lt;virgil/VirgilByteArray.h&gt;
  using virgil::VirgilByteArray;
  #include &lt;virgil/service/VirgilStreamSigner.h&gt;
  using virgil::service::VirgilStreamSigner;
  #include &lt;virgil/stream/VirgilStreamDataSource.h&gt;
  using virgil::stream::VirgilStreamDataSource;
  #include &lt;virgil/service/data/VirgilSign.h&gt;
  using virgil::service::data::VirgilSign;
  #include &lt;virgil/stream/utils.h&gt;

  int main() {
      try {
          std::cout << "Prepare input file: test.txt..." << std::endl;
          std::ifstream inFile("test.txt", std::ios::in | std::ios::binary);
          if (!inFile.good()) {
              throw std::runtime_error("can not read file: test.txt");
          }

          std::cout << "Prepare output file: test.txt.sign..." << std::endl;
          std::ofstream outFile("test.txt.sign", std::ios::out | std::ios::binary);
          if (!outFile.good()) {
              throw std::runtime_error("can not write file: test.txt.sign");
          }

          std::cout << "Read virgil public key..." << std::endl;
          VirgilCertificate virgilPublicKey = virgil::stream::read_certificate("virgil_public.key");

          std::cout << "Read private key..." << std::endl;
          std::ifstream keyFile("private.key", std::ios::in | std::ios::binary);
          if (!keyFile.good()) {
              throw std::runtime_error("can not read private key: private.key");
          }
          VirgilByteArray privateKey;
          std::copy(std::istreambuf_iterator<char>(keyFile), std::istreambuf_iterator<char>(),
                  std::back_inserter(privateKey));
          VirgilByteArray privateKeyPassword = virgil::str2bytes("password");

          std::cout << "Initialize signer..." << std::endl;
          VirgilStreamSigner signer;

          std::cout << "Sign data..." << std::endl;
          VirgilStreamDataSource dataSource(inFile);
          VirgilSign sign = signer.sign(dataSource, virgilPublicKey.id().certificateId(),
                  privateKey, privateKeyPassword);

          std::cout << "Save sign..." << std::endl;
          VirgilByteArray signData = sign.toAsn1();
          std::copy(signData.begin(), signData.end(), std::ostreambuf_iterator<char>(outFile));

          std::cout << "Sign is successfully stored in the output file." << std::endl;
      } catch (std::exception& exception) {
          std::cerr << "Error: " << exception.what() << std::endl;
      }
      return 0;
  }
                  </code>
              </pre>
              <pre data-code-tab="verify">
                  <code class="lang-cpp">
  #include &lt;iostream&gt;
  #include &lt;fstream&gt;
  #include &lt;algorithm&gt;
  #include &lt;iterator&gt;
  #include &lt;string&gt;
  #include &lt;stdexcept&gt;

  #include &lt;virgil/VirgilByteArray.h&gt;
  using virgil::VirgilByteArray;
  #include &lt;virgil/crypto/VirgilBase64.h&gt;
  using virgil::crypto::VirgilBase64;
  #include &lt;virgil/service/VirgilStreamSigner.h&gt;
  using virgil::service::VirgilStreamSigner;
  #include &lt;virgil/service/data/VirgilSign.h&gt;
  using virgil::service::data::VirgilSign;
  #include &lt;virgil/service/data/VirgilCertificate.h&gt;
  using virgil::service::data::VirgilCertificate;
  #include &lt;virgil/stream/VirgilStreamDataSource.h&gt;
  using virgil::stream::VirgilStreamDataSource;
  #include &lt;virgil/stream/utils.h&gt;

  #include &lt;curl/curl.h&gt;
  #include &lt;json/json.h&gt;

  #define VIRGIL_PKI_URL_BASE "https://pki.virgilsecurity.com/"
  #define SIGNER_ID_TYPE "email"
  #define SIGNER_ID "test.virgilsecurity@mailinator.com"

  #define MAKE_URL(base, path) (base path)

  static int pki_callback(char *data, size_t size, size_t nmemb, std::string *buffer_in) {
      // Is there anything in the buffer?
      if (buffer_in != NULL) {
          // Append the data to the buffer
          buffer_in->append(data, size * nmemb);
          return size * nmemb;
      }
      return 0;
  }

  static std::string pki_post(const std::string& url, const std::string& json) {
      CURL *curl = NULL;
      CURLcode result = CURLE_OK;
      struct curl_slist *headers = NULL;
      std::string response;

      /* In windows, this will init the winsock stuff */
      curl_global_init(CURL_GLOBAL_ALL);

      /* get a curl handle */
      curl = curl_easy_init();
      if (curl) {
          /* set content type */
          headers = curl_slist_append(headers, "Accept: application/json");
          headers = curl_slist_append(headers, "Content-Type: application/json");
          /* Set the URL */
          curl_easy_setopt(curl, CURLOPT_URL, url.c_str());
          /* Now specify the POST data */
          curl_easy_setopt(curl, CURLOPT_CUSTOMREQUEST, "POST");
          curl_easy_setopt(curl, CURLOPT_HTTPHEADER, headers);

          curl_easy_setopt(curl, CURLOPT_COPYPOSTFIELDS, json.c_str());

          curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, pki_callback);
          curl_easy_setopt(curl, CURLOPT_WRITEDATA, (void *)(&response));

          /* Perform the request, result will get the return code */
          result = curl_easy_perform(curl);

          /* free headers */
          curl_slist_free_all(headers);

          /* cleanup curl handle */
          curl_easy_cleanup(curl);
      }
      curl_global_cleanup();

      /* Check for errors */
      if (result == CURLE_OK) {
          return response;
      } else {
          throw std::runtime_error(std::string("cURL failed with error: ") + curl_easy_strerror(result));
      }
  }

  VirgilCertificate pki_get_public_key(const std::string& userIdType, const std::string& userId) {
      // Create request
      Json::Value payload;
      payload[userIdType] = userId;
      // Perform request
      std::string response = pki_post(MAKE_URL(VIRGIL_PKI_URL_BASE, "objects/account/actions/search"),
              Json::FastWriter().write(payload));
      // Parse response
      Json::Reader reader(Json::Features::strictMode());
      Json::Value responseObject;
      if (!reader.parse(response, responseObject)) {
          throw std::runtime_error(reader.getFormattedErrorMessages());
      }
      const Json::Value& virgilPublicKeyObject = responseObject[0]["public_keys"][0];
      const Json::Value& idObject = virgilPublicKeyObject["id"]["public_key_id"];
      const Json::Value& publicKeyObject = virgilPublicKeyObject["public_key"];

      if (idObject.isString() && publicKeyObject.isString()) {
          VirgilCertificate virgilPublicKey(VirgilBase64::decode(publicKeyObject.asString()));
          virgilPublicKey.id().setCertificateId(virgil::str2bytes(idObject.asString()));
          return virgilPublicKey;
      } else {
          throw std::runtime_error(std::string("virgil public key for recipient '") + userId +
                  "' of type '" + userIdType + "' not found");
      }
  }

  int main() {
      try {
          std::cout << "Prepare input file: test.txt..." << std::endl;
          std::ifstream inFile("test.txt", std::ios::in | std::ios::binary);
          if (!inFile.good()) {
              throw std::runtime_error("can not read file: test.txt");
          }

          std::cout << "Read virgil sign..." << std::endl;
          VirgilSign virgilSign = virgil::stream::read_sign("test.txt.sign");

          std::cout << "Get signer ("<< SIGNER_ID << ") information from the Virgil PKI service..." << std::endl;
          VirgilCertificate virgilPublicKey = pki_get_public_key(SIGNER_ID_TYPE, SIGNER_ID);

          std::cout << "Initialize verifier..." << std::endl;
          VirgilStreamSigner signer;

          std::cout << "Verify data..." << std::endl;
          VirgilStreamDataSource dataSource(inFile);
          bool verified = signer.verify(dataSource, virgilSign, virgilPublicKey.publicKey());

          std::cout << "Data is " << (verified ? "" : "not ") << "verified!" << std::endl;
      } catch (std::exception& exception) {
          std::cerr << "Error: " << exception.what() << std::endl;
      }
      return 0;
  }
                  </code>
              </pre>
          </div>

              <div class="section" data-section="php">
                  <pre data-code-tab="generate-keys">
                      <code class="lang-php">
  &lt;php

  require_once 'lib/virgil_php.php';

  echo 'Generate keys with with password: "password"';

  $key = new VirgilKeyPair('password');
  file_put_contents('data' . DIRECTORY_SEPARATOR . 'new_public.key', $key->publicKey());
  file_put_contents('data' . DIRECTORY_SEPARATOR . 'new_private.key', $key->privateKey());
                      </code>
                  </pre>
                  <pre data-code-tab="encrypt">
                      <code class="lang-php">
  &lt;?php

  require_once 'lib/virgil_php.php';

  const VIRGIL_PKI_URL_BASE = 'https://pki.virgilsecurity.com/';
  const USER_ID_TYPE = 'email';
  const USER_ID = 'test.php.virgilsecurity-02@mailinator.com';

  function getUrl($endpoint) {
      return VIRGIL_PKI_URL_BASE . $endpoint;
  }

  function httpPost($url, $data = array()) {
      $result = null;

      try {
          $ch = curl_init($url);

          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type:application/json',
              'Accept:application/json'
          ));

          $result = curl_exec($ch);

          if(curl_errno($ch) > 0) {
              throw new Exception('HTTP Request error: ' . curl_error($ch));
          }

          curl_close($ch);
      } catch (Exception $e) {
          echo $e->getMessage();
      }

      return $result;
  }

  function searchPublicKey($userDataType, $userDataId) {
      $payload = array(
          $userDataType => $userDataId
      );

      $response = json_decode(httpPost(getUrl('objects/account/actions/search'), $payload));

      if(empty($response) || !empty($response->error)) {
          throw new Exception('Unable to register user');
      }

      $pkiPublicKey = reset($response);

      $virgilCertificate = new VirgilCertificate(base64_decode(reset($pkiPublicKey->public_keys)->public_key));
      $virgilCertificate->id()->setAccountId($pkiPublicKey->id->account_id);
      $virgilCertificate->id()->setCertificateId(reset($pkiPublicKey->public_keys)->id->public_key_id);

      return $virgilCertificate;
  }



  try {
      echo 'Read source file' . PHP_EOL;

      $source = file_get_contents('data' . DIRECTORY_SEPARATOR . 'test.txt');
      if($source === false) {
          throw new Exception('Unable to get source data');
      }

      echo 'Initialize cipher' . PHP_EOL;

      $cipher = new VirgilCipher();

      echo 'Get recipient ' . USER_ID . ' information from the Virgil PKI service...' . PHP_EOL;

      $virgilCertificate = searchPublicKey(USER_ID_TYPE, USER_ID);

      echo 'Add recipient' . PHP_EOL;

      $cipher->addKeyRecipient($virgilCertificate->id()->certificateId(), $virgilCertificate->publicKey());

      echo 'Encrypt and store results' . PHP_EOL;

      $encryptedData = $cipher->encrypt($source, true);

      if(file_put_contents('data' . DIRECTORY_SEPARATOR . 'test.txt.enc', $encryptedData)) {
          echo 'Data successfully encrypted and stored into test.txt.enc' . PHP_EOL;
      }

  } catch (Exception $e) {
      echo $e->getMessage();
  }
                      </code>
                  </pre>
              <pre data-code-tab="decrypt">                  
                  <code class="lang-php">
  &lt;?php

  require_once 'lib/virgil_php.php';

  try {
      echo 'Read encrypted data' . PHP_EOL;

      $source = file_get_contents('data' . DIRECTORY_SEPARATOR . 'test.txt.enc');
      if($source === false) {
          throw new Exception('Unable to get source data');
      }

      echo 'Initialize cipher' . PHP_EOL;

      $cipher     = new VirgilCipher();
      $privateKey = file_get_contents('data' . DIRECTORY_SEPARATOR . 'new_private.key');

      if($privateKey === false) {
          throw new Exception('Unable to read private key file');
      }

      $virgilCertificate = new VirgilCertificate();
      $virgilCertificate->fromJson(file_get_contents('data' . DIRECTORY_SEPARATOR . 'virgil_public.key'));

      echo 'Decrypt data' . PHP_EOL;

      $decryptedData = $cipher->decryptWithKey($source, $virgilCertificate->id()->certificateId(), $privateKey, 'password');

      echo 'Save decrypted data to file' . PHP_EOL;

      file_put_contents('data' . DIRECTORY_SEPARATOR . 'decrypted.test.txt', $decryptedData);

  } catch (Exception $e) {
      echo $e->getMessage();
  }
                  </code>
              </pre>
              <pre data-code-tab="sign">
                  <code class="lang-php">
  &lt;?php

  require_once 'lib/virgil_php.php';

  try {
      echo 'Read source file' . PHP_EOL;

      $source = file_get_contents('data' . DIRECTORY_SEPARATOR . 'test.txt');
      if($source === false) {
          throw new Exception('Unable to get source data');
      }

      echo 'Read public key from json' . PHP_EOL;

      $publicKeyJson = file_get_contents('data' . DIRECTORY_SEPARATOR . 'virgil_public.key');
      if($publicKeyJson === false) {
          throw new Exception('Failed to open public key file');
      }

      $virgilCertificate = new VirgilCertificate();
      $virgilCertificate->fromJson($publicKeyJson);

      echo 'Read private key' . PHP_EOL;

      $privateKey = file_get_contents('data' . DIRECTORY_SEPARATOR . 'new_private.key');
      if($privateKey === false) {
          throw new Exception('Failed to open private key file');
      }

      echo 'Initialize signer' . PHP_EOL;

      $signer = new VirgilSigner();

      echo 'Sign data' . PHP_EOL;

      $sign = $signer->sign($source, $virgilCertificate->id()->certificateId(), $privateKey, 'password');

      echo 'Save signed data to file' . PHP_EOL;

      file_put_contents('data' . DIRECTORY_SEPARATOR . 'test.txt.sign', $sign->toJson());

  } catch (Exception $e) {
      echo $e->getMessage();
  }
                  </code>
              </pre>            
              <pre data-code-tab="verify">
                  <code class="lang-php">
   &lt;?php

  require_once 'lib/virgil_php.php';

  try {
      echo 'Read source file' . PHP_EOL;

      $source = file_get_contents('data' . DIRECTORY_SEPARATOR . 'test.txt');
      if($source === false) {
          throw new Exception('Unable to get source data');
      }

      echo 'Read sign from json' . PHP_EOL;

      $signJson = file_get_contents('data' . DIRECTORY_SEPARATOR . 'test.txt.sign');
      if($signJson === false) {
          throw new Exception('Filed to open sign file');
      }

      $sign = new VirgilSign();
      $sign->fromJson($signJson);

      echo 'Read public key from json' . PHP_EOL;

      $publicKeyJson = file_get_contents('data' . DIRECTORY_SEPARATOR . 'virgil_public.key');
      if($publicKeyJson === false) {
          throw new Exception('Failed to open public key file');
      }

      $virgilCertificate = new VirgilCertificate();
      $virgilCertificate->fromJson($publicKeyJson);

      echo 'Initialize signer' . PHP_EOL;

      $signer = new VirgilSigner();

      echo 'Verify sign' . PHP_EOL;

      if($signer->verify($source, $sign, $virgilCertificate->publicKey()) == true) {
          echo 'Data is verified';
      } else {
          echo 'Data is not verified';
      }

  } catch (Exception $e) {
      echo $e->getMessage();
  }
                  </code>
              </pre>            
              <pre data-code-tab="register-user">
                  <code class="lang-php">
  &lt;?php

  require_once 'lib/virgil_php.php';

  const VIRGIL_PKI_URL_BASE = 'https://pki.virgilsecurity.com/';
  const USER_ID_TYPE = 'email';
  const USER_ID = 'test.php.virgilsecurity-02@mailinator.com';

  function getUrl($endpoint) {
      return VIRGIL_PKI_URL_BASE . $endpoint;
  }

  function httpPost($url, $data = array()) {
      $result = null;

      try {
          $ch = curl_init($url);

          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type:application/json',
              'Accept:application/json'
          ));

          $result = curl_exec($ch);

          if(curl_errno($ch) > 0) {
              throw new Exception('HTTP Request error: ' . curl_error($ch));
          }

          curl_close($ch);
      } catch (Exception $e) {
          echo $e->getMessage();
      }

      return $result;
  }

  function pkiCreateUser($publicKey, $userIds) {
      $payload = array(
          'public_key' => base64_encode($publicKey),
          'user_data'  => array_map(function($value, $key) {
              return array(
                  'class' => 'user_id',
                  'type'  => $key,
                  'value' => $value
              );
          }, $userIds, array_keys($userIds))
      );

      $response = json_decode(httpPost(getUrl('objects/public-key'), $payload));

      if(empty($response) || !empty($response->error)) {
          throw new Exception('Unable to register user');
      }

      $virgilCertificate = new VirgilCertificate($publicKey);
      $virgilCertificate->id()->setAccountId($response->id->account_id);
      $virgilCertificate->id()->setCertificateId($response->id->public_key_id);

      return $virgilCertificate;
  }

  echo 'Read public key file' . PHP_EOL;

  $publicKey = file_get_contents('data' . DIRECTORY_SEPARATOR . 'new_public.key');

  try {
      $virgilCertificate = pkiCreateUser($publicKey, array(
          USER_ID_TYPE => USER_ID
      ));

      echo 'Store virgil public key to the output file...';

      file_put_contents('data' . DIRECTORY_SEPARATOR . 'virgil_public.key', $virgilCertificate->publicKey());
  } catch (Exception $e) {
      echo $e->getMessage();
  }
                  </code>
              </pre>
              <pre data-code-tab="get-public-key">
                  <code class="lang-php">
  &lt;?php

  require_once 'lib/virgil_php.php';

  const VIRGIL_PKI_URL_BASE = 'https://pki.virgilsecurity.com/';
  const USER_ID_TYPE = 'email';
  const USER_ID = 'test.php.virgilsecurity-02@mailinator.com';

  function getUrl($endpoint) {
      return VIRGIL_PKI_URL_BASE . $endpoint;
  }

  function httpPost($url, $data = array()) {
      $result = null;

      try {
          $ch = curl_init($url);

          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type:application/json',
              'Accept:application/json'
          ));

          $result = curl_exec($ch);

          if(curl_errno($ch) > 0) {
              throw new Exception('HTTP Request error: ' . curl_error($ch));
          }

          curl_close($ch);
      } catch (Exception $e) {
          echo $e->getMessage();
      }

      return $result;
  }

  function httpGet($url, $data = array()) {
      $result = null;

      try {
          $ch = curl_init($url . '?' . http_build_query($data));

          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type:application/json',
              'Accept:application/json'
          ));

          $result = curl_exec($ch);

          if(curl_errno($ch) > 0) {
              throw new Exception('HTTP Request error: ' . curl_error($ch));
          }

          curl_close($ch);
      } catch (Exception $e) {
          echo $e->getMessage();
      }

      return $result;
  }

  function searchPublicKey($userDataType, $userDataId) {
      $payload = array(
          $userDataType => $userDataId
      );

      $response = json_decode(httpPost(getUrl('objects/account/actions/search'), $payload));

      if(empty($response) || !empty($response->error)) {
          throw new Exception('Unable to register user');
      }

      $pkiPublicKey = reset($response);

      $virgilCertificate = new VirgilCertificate(reset($pkiPublicKey->public_keys)->public_key);
      $virgilCertificate->id()->setAccountId($pkiPublicKey->id->account_id);
      $virgilCertificate->id()->setCertificateId(reset($pkiPublicKey->public_keys)->id->public_key_id);

      return $virgilCertificate;
  }

  function getPublicKeyById($publicKeyId) {
      $response = json_decode(httpGet(getUrl('/objects/public-key/' . $publicKeyId)));

      if(empty($response) || !empty($response->error)) {
          throw new Exception('Unable to register user');
      }

      $virgilCertificate = new VirgilCertificate($response->public_key);
      $virgilCertificate->id()->setAccountId($response->id->account_id);
      $virgilCertificate->id()->setCertificateId($response->id->public_key_id);

      return $virgilCertificate;
  }


  try {
      echo 'Search by user data type and user data ID' . PHP_EOL;

      $virgilCertificate = searchPublicKey(USER_ID_TYPE, USER_ID);

      echo 'Get public key by id' . PHP_EOL;

      $virgilCertificate = getPublicKeyById($virgilCertificate->id()->certificateId());

      file_put_contents('data' . DIRECTORY_SEPARATOR . 'virgil_public.key', $virgilCertificate->toJson());

  } catch (Exception $e) {
      echo $e->getMessage();
  }
                  </code>
              </pre>
              </div>
          </div>
      </section>
  </div>
  @stop
