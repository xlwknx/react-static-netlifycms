@section('title')
Virgil | Developers | PHP | Quickstart
@show

@section('header-block')
    <div class="dev-header-container">
        <div class="container">
            <h1 class="text-left">Getting started with PHP</h1>
            <h3 class="text-left">This documentation helps you to star developing secure apps using Virgil services</h3>        
        </div>        
    </div>    
    @include('pages.public.documents.php.partial.header')
@show

@section('content')
<div class="dev">
    <div class="container">
		<div class="row">
			<div class="col-md-38 dev-content">
				<h2>Introduction</h2>
				<p>
           			This documentation will help you get started using two main <b>Virgil Security</b> components like
            		Crypto Library and <a href="/documents/csharp/keys-service">Keys Service</a> for most popular platforms and languages.
        		</p>
        		<h2 id="obtaining-an-app-token">Obtaining an App Token</h2>
		        <p>
		            To use the Public Keys Service, you will first need to sign in with your developer account on developers
		            <a href="/dashboard">dashboard</a> and generate app token for your
		            application. If you do not have a <b>Virgil Security</b> account, you can create one here
		            <a href="/signup">https://virgilsecurity.com/signup</a>.
		        </p>
		        <p>
		            The app token is passed with each API call and is used to authenticate you access to the Public Keys
		            service. It provides a secure access to the Public Keys service and allows the API to associate your
		            application’s requests with your <b>Virgil Security</b> developer account.
		        </p>
        		<p>Simply add your app token to HTTP header to each request:</p>
        		<pre><code>X-VIRGIL-APP-TOKEN: { YOUR_APP_TOKEN }</code></pre>
 				<h2 id="install">Install</h2>
		        <p>
		            There are several ways to install and use the Crypto Library and Virgil SDK in your environment.
		        </p>
		        <ol>
		            <li>Install with one of supported <a href="#package-management-system">Package Management Systems</a></li>
		            <li><a href="/documents/csharp/downloads">Download</a> from our web site</li>
		            <li><a href="/documents/csharp/crypto-lib#build">Build</a> by yourself</li>
		        </ol>
		        <h3 id="#package-management-system">Package Management Systems</h3>
		        <p>
		            Virgil Security supports most of popular package management systems, you can easily add Crypto Library
		            dependency to your solution, just folow examples below to do it right for your platform.
		        </p>
                <p>
                	Composer is a tool for dependency management in PHP. It allows you to declare the dependent libraries your 
                    project needs and it will install them in your project for you.. Folow example below to add Virgil.SDK dependency to
                    your project
                </p>
                <pre><code>{
    "require": {
        "virgil.sdk": "1.0.*",
        "virgil.crypto": "1.0.*"
    }
}</code></pre>
				<h2 id="generate-keys">Generate Keys</h2>
		        <p>
		            To start working with Virgil Security Services it is require the creation of a public key and a
		            private key. The public key can be made public to anyone using Public Keys Service, while the
		            private key must known only by the party who will decrypt the data encrypted with the public key.
		        </p>
		        <blockquote class="danger">
		            Private keys should never be stored verbatim or in plain text on the local computer.
		            <footer>
		                If you need to store a private key, you should use a secure key container depending on your
		                platform. You also can use Virgil Security Services. This will allows you to easily synchronize
		                private keys between clients devices and applications. Please read more about
		                <a href="/documents/csharp/keys-service">Keys Service</a>.
		            </footer>
		        </blockquote>
		        <p>
		            The following code example creates a new public/private key pair.
		        </p>
                    <pre><code class="language-csharp">&lt;?php

require_once './vendor/autoload.php';

echo 'Generate keys with with password: "password"';

$key = new VirgilKeyPair('password');
file_put_contents('data' . DIRECTORY_SEPARATOR . 'new_public.key', $key->publicKey());
file_put_contents('data' . DIRECTORY_SEPARATOR . 'new_private.key', $key->privateKey());</code></pre>
				<h2 id="register-user">Register User</h2>
        		<p>
            		Once you've created public key you may push it to the Public Keys Service.
            		This will allow other users to send you encrypted data using your public key.
        		</p>
        		<p>
           			This example shows how to upload public key and register new account on
            		Public Keys Service.
        		</p>
        		<p>Full source code examples available on <a href="https://github.com/VirgilSecurity/virgil-net/tree/master/Samples">GitHub</a> in public access.</p>
        		<pre><code class="language-csharp">&lt;?php

use Virgil\PKI\Models\VirgilUserData;
use Virgil\PKI\Models\VirgilUserDataCollection;

require_once './vendor/autoload.php';

const VIRGIL_PKI_URL_BASE = 'https://pki-stg.virgilsecurity.com/v1/';
const USER_ID_TYPE = 'email';
const USER_ID = 'test.php.virgilsecurity-032@mailinator.com';
const USER_DATA_CLASS = 'user_id';
const VIRGIL_APP_TOKEN = '1234567890';


echo 'Read public key file' . PHP_EOL;

$publicKey = file_get_contents('data' . DIRECTORY_SEPARATOR . 'new_public.key');

try {
    $pkiClient = new Virgil\PKI\PkiClient(VIRGIL_APP_TOKEN);

    $userData = new VirgilUserData();
    $userData->class = USER_DATA_CLASS;
    $userData->type  = USER_ID_TYPE;
    $userData->user_data_id = USER_ID;

    $userDataCollection = new VirgilUserDataCollection(array($userData));

    $virgilAccount = $pkiClient->getAccountsClient()->register($userDataCollection, $publicKey);

    echo 'Store virgil public key to the output file...';

    file_put_contents('data' . DIRECTORY_SEPARATOR . 'virgil_public.key', $virgilAccount->public_keys->get(0)->public_key);
} catch (Exception $e) {
    echo $e->getMessage();
}</code></pre>

		<h2 id="get-public-key">Get Public Key</h2>
        <p>
            Get public key from Public Keys Service.
        </p>
        <pre><code class="language-php">&lt;?php

require_once './vendor/autoload.php';

const VIRGIL_PKI_URL_BASE = 'https://pki.virgilsecurity.com/v1/';
const USER_ID_TYPE = 'email';
const USER_ID = 'test.php.virgilsecurity-02@mailinator.com';
const VIRGIL_APP_TOKEN = '1234567890';


try {
    $pkiClient = new Virgil\PKI\PkiClient(VIRGIL_APP_TOKEN);

    echo 'Search by user data type and user data ID' . PHP_EOL;

    $virgilCertificateCollection = $pkiClient->getPublicKeysClient()->searchKey(USER_ID, USER_ID_TYPE);
    $virgilCertificate = $virgilCertificateCollection->get(0);

    echo 'Get public key by id' . PHP_EOL;

    $virgilCertificate = $pkiClient->getPublicKeysClient()->getKey($virgilCertificate->public_key_id);

    file_put_contents('data' . DIRECTORY_SEPARATOR . 'virgil_public.key', $virgilCertificate->toJson());

} catch (Exception $e) {
    echo $e->getMessage();
}</code></pre>


        <h2 id="encrypt-data">Encrypt Data</h2>
        <p>
            The procedure for encrypting and decrypting documents is straightforward with this mental model.
            For example: if you want to encrypt the data to Bob, you encrypt it using Bobs's public key which you can
            get from Public Keys Service, and he decrypts it with his private key. If Bob wants to encrypt data to
            you, he encrypts it using your public key, and you decrypt it with your private key.
        </p>
        <p>
            In code example below we load we encrypt data using public key from Public Keys Service.
        </p>
        <pre><code class="language-php">&lt;?php

require_once './vendor/autoload.php';

const VIRGIL_PKI_URL_BASE = 'https://pki-stg.virgilsecurity.com/v1/';
const USER_ID_TYPE = 'email';
const USER_ID = 'test.php.virgilsecurity-02@mailinator.com';
const VIRGIL_APP_TOKEN = '1234567890';

try {
    $pkiClient = new Virgil\PKI\PkiClient(VIRGIL_APP_TOKEN);

    echo 'Read source file' . PHP_EOL;

    $source = file_get_contents('data' . DIRECTORY_SEPARATOR . 'test.txt');
    if($source === false) {
        throw new Exception('Unable to get source data');
    }

    echo 'Initialize cipher' . PHP_EOL;

    $cipher = new VirgilCipher();

    echo 'Get recipient ' . USER_ID . ' information from the Virgil PKI service...' . PHP_EOL;

    $virgilCertificateCollection = $pkiClient->getPublicKeysClient()->searchKey(USER_ID, USER_ID_TYPE);
    $virgilCertificate = $virgilCertificateCollection->get(0);

    echo 'Add recipient' . PHP_EOL;

    $cipher->addKeyRecipient($virgilCertificate->public_key_id, $virgilCertificate->public_key);

    echo 'Encrypt and store results' . PHP_EOL;

    $encryptedData = $cipher->encrypt($source, true);

    if(file_put_contents('data' . DIRECTORY_SEPARATOR . 'test.txt.enc', $encryptedData)) {
        echo 'Data successfully encrypted and stored into test.txt.enc' . PHP_EOL;
    }

} catch (Exception $e) {
    echo $e->getMessage();
}</code></pre>

        <h2 id="sign-data">Sign Data</h2>
        <p>
            Cryptographic digital signatures use public key algorithms to provide data integrity. When you sign
            data with a digital signature, someone else can verify the signature, and can prove that the data
            originated from you and was not altered after you signed it.
        </p>
        <p>The following example applies a digital signature to public key identifier.</p>

        <pre><code class="language-php">&lt;?php

require_once './vendor/autoload.php';

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
}</code></pre>

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
            The following example verifies a digital signature which was signed by sender.
        </p>

        <pre><code class="language-csharp">&lt;?php

require_once './vendor/autoload.php';

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
}</code></pre>

        <h2 id="decrypt-data">Decrypt Data</h2>
        <p>
            The following example illustrates the decryption of encrypted data by public key.
        </p>

        <pre><code class="language-csharp">&lt;?php

require_once './vendor/autoload.php';

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
}</code></pre>

			</div>
			<div class="col-md-10">
				<ul class="nav nav-pills nav-stacked dev-affix">
					<li class="title" role="presentation">Quickstart</li>
		            <li role="presentation"><a href="#introduction">Introduction</a></li>
		            <li role="presentation"><a href="#obtaining-an-app-token">Obtaining an App Token</a></li>
		            <li role="presentation"><a href="#install">Install</a></li>
		            <li role="presentation"><a href="#generate-keys">Generate Keys</a></li>
		            <li role="presentation"><a href="#register-user">Register User</a></li>
		            <li role="presentation"><a href="#get-public-key">Get Public Key</a></li>
		            <li role="presentation"><a href="#encrypt-data">Encrypt Data</a></li>
		            <li role="presentation"><a href="#decrypt-data">Decrypt Data</a></li>
		            <li role="presentation"><a href="#sign-data">Sign Data</a></li>
		            <li role="presentation"><a href="#verify-data">Verify Data</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
@stop
