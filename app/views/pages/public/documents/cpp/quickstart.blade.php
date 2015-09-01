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
                <section id="usage-examples">
                    <h2>Usage Examples</h2>
                    <p>
                        This section describes common case library usage scenarios, like
                    </p>
                    <ul>
                        <li>generate new keys;</li>
                        <li>register user's public key on the Virgil PKI service;</li>
                        <li>encrypt data for user identified by email, phone, etc;</li>
                        <li>decrypt data with private key;</li>
                        <li>sign data with private key;</li>
                        <li>verify data with signer identified by email, phone, etc.</li>
                    </ul>
                    <p>Full source code examples are available on <a href="https://github.com/VirgilSecurity/virgil-cpp/tree/master/examples">GitHub</a> in public access.</p>
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
                        <pre><code class="language-cpp">// Specify password in the constructor to store private key encrypted.
VirgilKeyPair newKeyPair; 

VirgilByteArray publicKey = newKeyPair.publicKey();
VirgilByteArray privateKey = newKeyPair.privateKey();
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
                <pre><code class="language-cpp">Credentials credentials(privateKey);
std::string uuid = "{random generated UUID}";
KeysClient keysClient("{Application Token}");
UserData userData = UserData::email("mail@server.com");
PublicKey virgilPublicKey = keysClient.publicKey().add(publicKey, {userData}, credentials, uuid);</code></pre>

<p>
    Confirm <b>User Data</b> using your user data type (Currently supported only Email).
</p>

<pre><code class="language-csharp">auto userDataId = virgilPublicKey.userData().front().userDataId();
auto confirmationCode = ""; // Confirmation code you received on your email box.
KeysClient keysClient("{Application Token}");
keysClient.userData().confirm(userDataId, confirmationCode);</code></pre>

        <h2 id="get-public-key">Get a User's Public Key</h2>
        <p>
            Get public key from Public Keys Service.
        </p>
        <pre><code class="language-cpp">KeysClient keysClient("{Application Token}");
PublicKey publicKey = keysClient.publicKey().grab("mail@server.com");</code></pre>


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
        <pre><code class="language-cpp">VirgilCipher cipher;
cipher.addKeyRecipient(virgil::crypto::str2bytes(publicKey.publicKeyId()), publicKey.key());
VirgilByteArray encryptedData = cipher.encrypt(virgil::crypto::str2bytes("Data to be encrypted."), true);</code></pre>

        <h2 id="sign-data">Sign Data</h2>
        <p>
            Cryptographic digital signatures use public key algorithms to provide data integrity. When you sign
            data with a digital signature, someone else can verify the signature, and can prove that the data
            originated from you and was not altered after you signed it.
        </p>
        <p>The following example applies a digital signature to a public key identifier.</p>

        <pre><code class="language-csharp">VirgilSigner signer;
VirgilByteArray data = virgil::crypto::str2bytes("some data");
VirgilByteArray sign = signer.sign(data, privateKey);</code></pre>

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

        <pre><code class="language-csharp">bool verified = signer.verify(data, sign, publicKey.key());</code></pre>

        <h2 id="decrypt-data">Decrypt Data</h2>
        <p>
            The following example illustrates the decryption of encrypted data. 
        </p>

        <pre><code class="language-csharp">VirgilByteArray decryptedData = cipher.decrypt(encryptedData, publicKey.publicKeyId(), privateKey);</code></pre>

            </div>
            <div class="col-md-3 scrollspy">
                    <ul class="nav hidden-xs hidden-sm dev-sidenav" data-spy="affix" data-offset-top="250" >                        
                        <li><p>Quickstart</p></li>
                        <li><a href="#introduction">Introduction</a></li>
                        <li><a href="#obtaining-an-app-token">Obtaining an App Token</a></li>
                        <li><a href="#usage-examples">Usage examples</a></li>
                        <li><a href="#generate-keys">Generate keys</a></li>
                        <li><a href="#register-user">Add User's Public Key</a></li>
                        <li><a href="#get-public-key">Get User's Public Key</a></li>
                        <li><a href="#encrypt-data">Encrypt Data</a></li>
                        <li><a href="#sign-data">Sign Data</a></li>
                        <li><a href="#verify-data">Verify Data</a></li>
                        <li><a href="#decrypt-data">Decrypt Data</a></li>    
                        <li><a href="https://github.com/VirgilSecurity/virgil-cpp">GitHub Sources</a></li>     
                    </ul>
                </div>
            </div>
        </div>
    </div>

@stop
