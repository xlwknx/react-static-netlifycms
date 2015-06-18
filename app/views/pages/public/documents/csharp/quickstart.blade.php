@section('title')
Virgil | Developers | C#/.NET | Quickstart
@show

@section('header-block')
    <div class="dev-header-container">
        <div class="container">
            <h1 class="text-left">Getting started with .NET/C#</h1>
            <h3 class="text-left">This documentation helps you to star developing secure apps using Virgil services</h3>        
        </div>        
    </div>    
    @include('pages.public.documents.csharp.partial.header')
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
                	NuGet is the package manager for the Microsoft development platform including .NET. You can
                    install the latest version of Virgil.PKI library with the command:
                </p>
                <pre><code>PM> Install-Package Virgil.PKI</code></pre>
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
                    <pre><code class="language-csharp">usign Virgil.Crypto;
using Virgil.SDK.Keys;

...

byte[] publicKeyPassword = Encoding.UTF8.GetBytes("password");
var virgilKeyPair = new VirgilKeyPair(publicKeyPassword);

byte[] publicKeyBytes = virgilKeyPair.PublicKey();
byte[] privateKeyBytes = virgilKeyPair.PrivateKey();
</code></pre>
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
        		<pre><code class="language-csharp">var pkiClient = new PkiClient("{Token}");
var virgilUserData = new VirgilUserData(UserDataType.Email, "mail@server.com");
var virgilAccount = await pkiClient.Accounts.Register(virgilUserData, publicKeyBytes);</code></pre>

		<h2 id="get-public-key">Get Public Key</h2>
        <p>
            Get public key from Public Keys Service.
        </p>
        <p>Source code example: <a href="https://github.com/VirgilSecurity/virgil-net/blob/master/Virgil.Samples/Samples/GetPublicKey.cs">GetPublicKey.cs</a></p>
                    <pre><code class="language-csharp">var publicKey = await pkiClient.PublicKeys.Get("mail@server.com", UserDataType.Email);</code></pre>


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
        <pre><code class="language-csharp">var virgilStreamCipher = new VirgilCipher();
var publicKeyIdBytes = Encoding.UTF8.GetBytes(publicKey.PublicKeyId.ToString());
virgilStreamCipher.AddKeyRecipient(publicKeyIdBytes, publicKey.PublicKey);

byte[] data = Encoding.UTF8.GetBytes("Some data to be encrypted");
byte[] encryptedData = virgilStreamCipher.Encrypt(data, true);</code></pre>

        <h2 id="sign-data">Sign Data</h2>
        <p>
            Cryptographic digital signatures use public key algorithms to provide data integrity. When you sign
            data with a digital signature, someone else can verify the signature, and can prove that the data
            originated from you and was not altered after you signed it.
        </p>
        <p>The following example applies a digital signature to public key identifier.</p>

        <pre><code class="language-csharp">var signer = new VirgilSigner();
var sign = signer.Sign(encryptedData, publicKeyIdBytes, privateKeyBytes);

// serialize signature

byte[] asn1Sign = sign.ToAsn1();

// deserialize signature

var virgilSign = new VirgilSign();
virgilSign.FromAsn1(asn1Sign);</code></pre>

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

        <pre><code class="language-csharp">bool verified = signer.Verify(encryptedData, virgilSign, publicKeyBytes);</code></pre>

        <h2 id="decrypt-data">Decrypt Data</h2>
        <p>
            The following example illustrates the decryption of encrypted data by public key.
        </p>

        <pre><code class="language-csharp">byte[] decryptedBytes = virgilStreamCipher.DecryptWithKey(encryptedData, publicKeyIdBytes, privateKeyBytes);</code></pre>

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
