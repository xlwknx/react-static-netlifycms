@section('title')
Virgil | Developers | C/C++ | Quickstart
@show

@section('content')
    
    @include('pages.public.documents.cpp.partial.header')

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <section id="introduction">
                    <h2>Introduction</h2>
                    <p>
                        This guide will help you get started using the Crypto Library and Virgil Keys Service, for the most popular platforms and languages
                    </p>
                    <h2 id="obtaining-an-app-token">Obtaining an Application Token</h2>
                    <p>
                        First you must create a free Virgil Security developer account by signing up <a href="/signup">here</a>.  
                        Once you have your account you can <a href="/signin">sign in</a> and generate an app token for your application.
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
                        There are several ways to install and use the Crypto Library and Virgil’s SDK in your environment.
                    </p>
                    <ol>
                        <li>Install with <a href="#package-management-system">Package Management System</a></li>
                        <li><a href="/documents/csharp/downloads">Download</a> from our web site</li>
                        <li><a href="/documents/csharp/crypto-lib#build">Build</a> by yourself</li>
                    </ol>
                    <h3 id="#package-management-system">Package Management Systems</h3>
                    <p>
                        <b>Virgil Security</b> supports most of popular package management systems. 
                        You can easily add the Crypto Library dependency to your project, just follow the examples below.
                    </p>
    
                    <pre><code>PM> Install-Package Virgil.Crypto</code></pre>
                    <p>
                        Virgil Public Keys SDK:
                    </p>
                    <pre><code>PM> Install-Package Virgil.SDK.Keys</code></pre>
                    <p>
                        Virgil Private Keys SDK:
                    </p>
                    <pre><code>PM> Install-Package Virgil.SDK.PrivateKeys</code></pre>
                </section>
                <section id="generate-keys">
                    <h2>Generate Keys</h2>
                    <p>
                        Working with Virgil Security Services it is requires the creation of both a public key and a private key. 
                        The public key can be made public to anyone using the Virgil Public Keys Service while the private key 
                        must be known only to the party or parties who will decrypt the data encrypted with the public key.
                    </p>
                    <blockquote class="danger">
                        Private keys should never be stored verbatim or in plain text on a local computer.
                        <footer>
                            If you need to store a private key, you should use a secure key container depending on your platform. 
                            You also can use Virgil Keys Service to store and synchronize private keys. This will allows you to 
                            easily synchronize private keys between clients’ devices and their applications. 
                            Please read more about <a href="/documents/csharp/keys-private-service">Virgil Private Keys Service</a>.
                        </footer>
                    </blockquote>
                    <p>
                        The following code example creates a new public/private key pair.
                    </p>
                        <pre><code class="language-csharp">using Virgil.Crypto;
using Virgil.SDK.Keys
using Virgil.SDK.PrivateKeys                 
...

byte[] publicKey;
byte[] privateKey;

using (var keyPair = new VirgilKeyPair())
{
    publicKey = keyPair.PublicKey();
    privateKey = keyPair.PrivateKey();
}
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
                <p>Full source code examples are available on <a href="https://github.com/VirgilSecurity/virgil-net">GitHub</a> in public access.</p>
                <pre><code class="language-csharp">var keysService = new PkiClient(new SDK.Keys.Http.Connection(Constants.ApplicationToken, 
    new Uri(Constants.KeysServiceUrl)));

var userData = new UserData
{
    Class = UserDataClass.UserId,
    Type = UserDataType.EmailId,
    Value = "your.email@server.hz"
};
            
var vPublicKey = await keysService.PublicKeys.Create(publicKey, publicKey, userData);</code></pre>

<p>
    Confirm <b>User Data</b> using your user data type (Currently supported only Email).
</p>

<pre><code class="language-csharp">var vUserData = vPublicKey.UserData.First();
var confirmCode = ""; // Confirmation code you received on your email box.

await keysService.UserData.Confirm(vUserData.UserDataId, confirmCode, vPublicKey.PublicKeyId, privateKey);</code></pre>

<h2 id="register-user">Store Private Key</h2>
<p>
    This example shows how to store private keys on Virgil Private Keys service using SDK, 
    this step is optional and you can use your own secure storage. 
</p>

<pre><code class="language-csharp">var privateKeysClient = new KeyringClient(new SDK.PrivateKeys.Http.Connection(Constants.ApplicationToken, 
    new Uri(Constants.PrivateKeysServiceUrl)));

var containerPassword = "12345678";

// You can choose between few types of container. Easy and Normal
//   Easy   - service keeps your private keys encrypted with container password, all keys should be sent 
//            encrypted with container password, before sent to the service.
//   Normal - responsibility for the security of the private keys at your own risk. 

var containerType = ContainerType.Easy; // ContainerType.Normal

// Initializes an container for private keys storage. 

await privateKeysClient.Container.Initialize(containerType, vPublicKey.PublicKeyId, 
    privateKey, containerPassword);

// Authenticate requests to Virgil Private Keys service.

privateKeysClient.Connection.SetCredentials(vUserData.Value, containerPassword);

// Add your private key to Virgil Private Keys service.

if (containerType == ContainerType.Easy)
{
    // private key will be encrypted with container password, provided on authentication
    await privateKeysClient.PrivateKeys.Add(vPublicKey.PublicKeyId, privateKey);
}
else
{
    // use your own password to encrypt the private key.
    var privateKeyPassword = "47N6JwTGUmFvn4Eh";
    await privateKeysClient.PrivateKeys.Add(vPublicKey.PublicKeyId, privateKey, privateKeyPassword);
}</code></pre>

        <h2 id="get-public-key">Get a Public Key</h2>
        <p>
            Get public key from Public Keys Service.
        </p>
        <pre><code class="language-csharp">var recepientPublicKey = await keysService.PublicKeys.Search("recepient.email@server.hz");</code></pre>


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
        <pre><code class="language-csharp">byte[] encryptedData;

using (var cipher = new VirgilCipher())
{
    byte[] recepientId = Encoding.UTF8.GetBytes(recepientPublicKey.PublicKeyId.ToString());
    byte[] data = Encoding.UTF8.GetBytes("Some data to be encrypted");

    cipher.AddKeyRecipient(recepientId, data);
    encryptedData = cipher.Encrypt(data, true);
}</code></pre>

        <h2 id="sign-data">Sign Data</h2>
        <p>
            Cryptographic digital signatures use public key algorithms to provide data integrity. When you sign
            data with a digital signature, someone else can verify the signature, and can prove that the data
            originated from you and was not altered after you signed it.
        </p>
        <p>The following example applies a digital signature to a public key identifier.</p>

        <pre><code class="language-csharp">byte[] sign;
using (var signer = new VirgilSigner())
{
    sign = signer.Sign(encryptedData, privateKey);
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
            The following example verifies a digital signature which was signed by the sender.
        </p>

        <pre><code class="language-csharp">bool isValid;
using (var signer = new VirgilSigner())
{
    isValid = signer.Verify(encryptedData, sign, publicKey);
}</code></pre>

        <h2 id="decrypt-data">Decrypt Data</h2>
        <p>
            The following example illustrates the decryption of encrypted data. 
        </p>

        <pre><code class="language-csharp">var recepientContainerPassword = "UhFC36DAtrpKjPCE";

var recepientPrivateKeysClient = new KeyringClient(new Connection(Constants.ApplicationToken));
recepientPrivateKeysClient.Connection.SetCredentials(
    new Credentials("recepient.email@server.hz", recepientContainerPassword));

var recepientPrivateKey = await recepientPrivateKeysClient.PrivateKeys.Get(recepientPublicKey.PublicKeyId);

byte[] decryptedDate;
using (var cipher = new VirgilCipher())
{
    decryptedDate = cipher.DecryptWithKey(encryptedData, recepientId, recepientPrivateKey.Key);
}</code></pre>

            </div>
            <div class="col-md-3 scrollspy">
                    <ul class="nav hidden-xs hidden-sm dev-sidenav" data-spy="affix" data-offset-top="250" >                        
                        <li><p>Quickstart</p></li>
                        <li><a href="#introduction">Introduction</a></li>
                        <li><a href="#obtaining-an-app-token">Obtaining an App Token</a></li>
                        <li><a href="#install">Install</a></li>
                        <li><a href="#generate-keys">Generate Keys</a></li>
                        <li><a href="#register-user">Register User</a></li>
                        <li><a href="#get-public-key">Get Public Key</a></li>
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
