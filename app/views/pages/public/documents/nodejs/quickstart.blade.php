@section('title')
Virgil | Documents | Node.js | Quickstart
@show

@section('content')
	
	@include('pages.public.documents.nodejs.partial.header')

    <div class="container">
		<div class="row">
			<div class="col-md-9">
                <section id="introduction">
				    <h2>Introduction</h2>
                    <p>
                        This guide will help you get started using the Crypto Library and Virgil Keys Service for  most popular platforms and languages.
                    </p>
                    <h2 id="obtaining-an-app-token">Obtaining an Application Token</h2>
                    <p>
                        First, create a free Virgil Security developer account by signing up <a href="/account/signup">here</a>. Once you have your account
                        you can <a href="/account/signin">sign in</a> and generate an app token for your application.
                    </p>
                    <p>
                        The app token provides authenticated secure access to Virgil’s Keys Service and is passed with each API call. 
                        The app token also allows the API to associate your app’s requests with your Virgil Security developer account.
                    </p>
                    <p>
                        Simply add your app token to the HTTP header for each request:
                    </p>
                    <pre><code>X-VIRGIL-APPLICATION-TOKEN: { YOUR_APPLICATION_TOKEN }</code></pre>
                </section>
                <section id="install">
                    <h2>Install</h2>
                    <p>
                        <b>Virgil Security</b> supports most popular package management systems. 
                        You can easily add the Crypto Library and SDK dependency to your project, just follow the examples below.
                    </p>
    
                    <pre><code>npm install virgil-crypto</code></pre>
                    <p>
                        Virgil Public Keys SDK:
                    </p>
                    <pre><code>npm install virgil-public-keys</code></pre>
                    <p>
                        Virgil Private Keys SDK:
                    </p>
                    <pre><code>npm install virgil-private-keys</code></pre>
                </section>
                <section id="generate-keys">
                    <h2>Generate Keys</h2>
                    <p>
                        Working with Virgil Security Services requires the creation of both a public key and a private key. 
                        The public key can be made public to anyone using the Virgil Public Keys Service while the private key 
                        must be known only to the party or parties who will decrypt the data encrypted with the public key.
                    </p>
                    <blockquote class="danger">
                        Private keys should never be stored verbatim or in plain text on a local computer.
                        <footer>
                            If you need to store a private key, you should use a secure key container depending on your platform. 
                            You also can use Virgil Keys Service to store and synchronize private keys. This will allows you to 
                            easily synchronize private keys between clients’ devices and their applications. 
                            Please read more about <a href="/documents/nodejs/keys-private-service">Virgil Private Keys Service</a>.
                        </footer>
                    </blockquote>
                    <p>
                        The following code example creates a new public/private key pair.
                    </p>
                        <pre><code class="js">var Virgil = require('virgil-crypto');
var keyPair = new Virgil.KeyPair();

var publicKey = keyPair.publicKey;
var privateKey = keyPair.privateKey;
</code></pre>
                </section>
				<h2 id="register-user">Register User</h2>
        		<p>
            		Once you've created a public key you may push it to Virgil’s Keys Service. 
            		This will allow other users to send you encrypted data using your public key.
        		</p>
        		<p>
           			This example shows how to upload a public key and register a new account on Virgil’s Keys Service.
        		</p>
        		<pre><code class="js">var VirgilPublicKeys = require('virgil-public-keys');

var applicationToken = '1b79865e30978ec2ec9a83a44916b0a5';
var userData = {
    'class': VirgilPublicKeys.USER_DATA_CLASSES.USER_ID,
    'type': VirgilPublicKeys.USER_DATA_TYPES.EMAIL,
    'value': 'your.email.@server.hz'
};

var publicKeysService = new VirgilPublicKeys(applicationToken);

publicKeysService.createPublicKey({
    public_key: publicKey,
    private_key: privateKey,
    user_data: userData
}).then(function confirmUserData (publicKeyData) {
    // Confirm **User Data** using your user data type (Currently supported only Email).
    // Wait for confirmation email and then confirm user data

    var confirmationCode = 'E4T0A2';

    publicKeysService.confirmUserData({
        user_data_id: publicKeyData.user_data.id,
        confirmation_code: confirmationCode
    }).then(function afterUserDataConfirmed () {
        // ...
    });
});</code></pre>

<h2 id="store-private-key">Store Private Key</h2>
<p>
	This example shows how to store private keys on Virgil Private Keys service using SDK, 
	this step is optional and you can use your own secure storage. 
</p>

<pre><code class="js">var VirgilPrivateKeys = require('virgil-private-keys');

var privateKeysService = new VirgilPrivateKeys(applicationToken);

// You can choose between few types of container. Easy and Normal
//   Easy   - service keeps your private keys encrypted with container password, all keys should be sent 
//            encrypted with container password, before sent to the service.
//   Normal - responsibility for the security of the private keys at your own risk. 

var containerType = VirgilPrivateKeys.CONTAINER_TYPES.EASY
var containerPassword = '123456789';
var userData = {
    'class': VirgilPublicKeys.USER_DATA_CLASSES.USER_ID,
    'type': VirgilPublicKeys.USER_DATA_TYPES.EMAIL,
    'value': 'your.email.@server.hz'
};

// Create container for private keys storage.
privateKeysService.createContainer({
    container_type: containerType,
    password: containerPassword,
    private_key: privateKey,
    public_key_id: publicKeyData.id.public_key_id
}).then(function getAuthToken () {
    return privateKeysService.getAuthToken({
        password: containerPassword,
        user_data: userData
    });
}).then(function createPrivateKey (authToken) {
    return privateKeysService.createPrivateKey({
        private_key: privateKey,
        private_key_encrypt_password: containerPassword, // Use same password as for container
        public_key_id: publicKeyId,
        auth_token: authToken
    });
});</code></pre>

		<h2 id="get-public-key">Get a Recepient's Public Key</h2>
        <p>
            Get a public key from Public Keys Service.
        </p>
        <pre><code class="js">publicKeysService.findPublicKey({
    value: 'some-email@example.com'
}).then(function (publicKeyData) {
    // ...
});</code></pre>


        <h2 id="encrypt-data">Encrypt Data</h2>
        <p>The procedure for encrypting and decrypting documents is simple. For example:</p>
        <p>
            If you want to encrypt the data to Bob, you encrypt it using Bobs's public key (which you can get from Public Keys Service), 
            and Bob decrypts it with his private key. If Bob wants to encrypt data to you, he encrypts it using your public key, 
            and you decrypt it with your private key.
        </p>
        <p>
            In the example below, we encrypt data using a public key from Virgil’s Public Keys Service.
        </p>
        <pre><code class="js">publicKeysService.findPublicKey({
    value: 'bob@bob.com'
}).then(function (recipientPublicKeyData) {
    var cipher = new Virgil.Cipher();
    var data = 'data to be encrypted';

    cipher.addKeyRecipient(recipientPublicKeyData.public_key_id);
    var encryptedData = cipher.encrypt(data);
});</code></pre>

        <h2 id="sign-data">Sign Data</h2>
        <p>
            Cryptographic digital signatures use public key algorithms to provide data integrity. When you sign
            data with a digital signature, someone else can verify the signature, and can prove that the data
            originated from you and was not altered after you signed it.
        </p>
        <p>The following example applies a digital signature to a public key identifier.</p>

        <pre><code class="js">var signer = new Virgil.Signer();
var sign = signer.sign(encryptedData, privateKey);</code></pre>

<h2 id="verify-data">Verify Data</h2>
        <p>
            To verify that data was signed by a particular party, you must have the following information:
        </p>
        <ul>
            <li>The public key of the party that signed the data.</li>
            <li>The digital signature.</li>
            <li>The data that was signed.</li>
        </ul>
        <p>
            The following example verifies a digital signature which was signed by the sender.
        </p>

        <pre><code class="js">var isValid = signer.verify(encryptedData, sign, publicKey);</code></pre>

        <h2 id="decrypt-data">Decrypt Data</h2>
        <p>
            The following example illustrates the decryption of encrypted data. 
        </p>

        <pre><code class="js">var recipientContainerPassword = 'UhFC36DAtrpKjPCE';
var recipientUserData = {
    'class': VirgilPrivateKeys.USER_DATA_CLASSES.USER_ID,
    'type': VirgilPrivateKeys.USER_DATA_TYPES.EMAIL,
    'value': 'recepient.email@server.hz'
};

privateKeysService.getAuthToken({
    password: recipientContainerPassword,
    user_data: recipientUserData
}).then(function getPrivateKey (recipientAuthToken) {
    return privateKeysService.getPrivateKey({
        public_key_id: recipientPublicKeyData.public_key_id,
        auth_token: recipientAuthToken,
        private_key_decrypt_password: recipientContainerPassword
    });
}).then(function decryptRecipientData (recipientPrivateKeyData) {
    var decryptedData = cipher.decryptWithKey(
        encryptedData,
        recipientPublicKeyData.public_key_id,
        recipientPrivateKeyData.private_key
    );
});</code></pre>

			</div>
			<div class="col-md-3 scrollspy">
                    <ul class="nav hidden-xs hidden-sm dev-sidenav" data-spy="affix" data-offset-top="250" >                        
                        <li><p>Quickstart</p></li>
                        <li><a href="#introduction">Introduction</a></li>
                        <li><a href="#obtaining-an-app-token">Obtaining an App Token</a></li>
                        <li><a href="#install">Install</a></li>
                        <li><a href="#generate-keys">Generate Keys</a></li>
                        <li><a href="#register-user">Register User</a></li>
                        <li><a href="#store-private-key">Store Private Key</a></li>
                        <li><a href="#get-public-key">Get a Public Key</a></li>
                        <li><a href="#encrypt-data">Encrypt Data</a></li>
                        <li><a href="#sign-data">Sign Data</a></li>
                        <li><a href="#verify-data">Verify Data</a></li>
                        <li><a href="#decrypt-data">Decrypt Data</a></li>                                                
                    </ul>
                </div>
			</div>
		</div>
	</div>
@stop
