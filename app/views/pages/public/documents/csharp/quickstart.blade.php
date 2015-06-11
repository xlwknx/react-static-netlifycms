@section('title')
Virgil | Developers | C#/.NET | Quickstart
@show

@section('content')
<div class="dev">
	@include('pages.public.documents.csharp.partial.header')
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
		            There are several ways to install and use the Crypto Library in your environment.
		        </p>
		        <ol>
		            <li>Install with one of supported <a href="#package-management-system">Package Management Systems</a></li>
		            <li><a href="https://virgilsecurity.com/downloads">Download</a> from our web site</li>
		            <li><a href="https://github.com/VirgilSecurity/virgil/wiki">Build</a> by yourself</li>
		        </ol>
		        <h3 id="#package-management-system">Package Management Systems</h3>
		        <p>
		            Virgil Security supports most of popular package management systems, you can easily add Crypto Library
		            dependency to your solution, just folow examples below to do it right for your platform.
		        </p>
                <p>
                	NuGet is the package manager for the Microsoft development platform including .NET. You can
                    install the latest version of Virgil.Net library with the command:
                </p>
                <pre><code>PM> Install-Package Virgil.Net</code></pre>
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
		                <a href="https://github.com/ddain/VirgilKeyRing">Keys Service</a>.
		            </footer>
		        </blockquote>
		        <p>
		            The following code example creates a new public/private key pair, and saves them in the file system.
		        </p>
Source code example: <a href="https://github.com/VirgilSecurity/virgil-net/blob/master/Virgil.Samples/Samples/GenerateKeys.cs">GenerateKeys.cs</a>
                    <pre><code class="language-csharp">public static void Run()
{
    Console.WriteLine("Generate keys with password: 'password'");
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
}</code></pre>
				<h2 id="register-user">Register User</h2>
        		<p>
            		Once you've created public key you may push it to the Public Keys Service.
            		This will allow other users to send you encrypted data using your public key.
        		</p>
        		<p>
           			This example shows how to upload public key and register new account on
            		Public Keys Service.
        		</p>
        		Source code example: <a href="https://github.com/VirgilSecurity/virgil-net/blob/master/Virgil.Samples/Samples/RegisterUser.cs">RegisterUser.cs</a>
        		<pre><code class="language-csharp">public static VirgilCertificate CreateUser(byte[] publicKey, string userIdType, string userId)
{
    var certificate = new
    {
        public_key = publicKey,
        user_data = new[]
        {
            new
            {
                &#64;class = "user_id",
                type = userIdType,
                value = userId
            }
        }
    };
    var httpClient = new HttpClient();
    const string uri = "https://pki.virgilsecurity.com/v1/public-key";
    var json = JsonConvert.SerializeObject(certificate);
    var content = new StringContent(json, Encoding.UTF8, "application/json");
    var responseMessage = httpClient.PostAsync(uri, content).Result;
    var reresponseText = responseMessage.Content.ReadAsStringAsync().Result;
    dynamic response = JsonConvert.DeserializeObject(reresponseText);
    
    string accountId = response.id.account_id;
    string publicKeyId = response.id.public_key_id;
    var virgilPublicKey = new VirgilCertificate(publicKey);
    virgilPublicKey.Id().SetAccountId(Encoding.UTF8.GetBytes(accountId));
    virgilPublicKey.Id().SetCertificateId(Encoding.UTF8.GetBytes(publicKeyId));
    return virgilPublicKey;
}</code></pre>

		<h2 id="get-public-key">Get Public Key</h2>
        <p>
            Get public key from Public Keys Service.
        </p>
                    <p>Source code example: <a href="https://github.com/VirgilSecurity/virgil-net/blob/master/Virgil.Samples/Samples/GetPublicKey.cs">GetPublicKey.cs</a></p>
                    <pre><code class="language-csharp">public static VirgilCertificate GetPkiPublicKey(string userIdType, string userId)
{
    const string uri = "https://pki.virgilsecurity.com/v1/account/actions/search";
    
    var httpClient = new HttpClient();
    var payload = new Dictionary&lt;string,string&gt;
    {
    	{userIdType, userId}
    };
    
    string json = JsonConvert.SerializeObject(payload, Formatting.None);
    var content = new StringContent(json, Encoding.UTF8, "application/json");
    var responseMessage = httpClient.PostAsync(uri, content).Result;
    string responseText = responseMessage.Content.ReadAsStringAsync().Result;
    dynamic response = JsonConvert.DeserializeObject(responseText);
    dynamic publicKeyObject = response[0].public_keys[0];
    string publicKeyId = publicKeyObject.id.public_key_id;
    string publicKey = publicKeyObject.public_key;
    var virgilPublicKey = new VirgilCertificate(VirgilBase64.Decode(publicKey));
    virgilPublicKey.Id().SetCertificateId(Encoding.UTF8.GetBytes(publicKeyId));
    return virgilPublicKey;
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
        <p>Source code example: <a href="https://github.com/VirgilSecurity/virgil-net/blob/master/Virgil.Samples/Samples/EncryptSample.cs">EncryptSample.cs</a></p>
        <pre><code class="language-csharp">public static void Run()
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
            virgilStreamCipher.AddKeyRecipient(virgilPublicKey.Id().CertificateId(), virgilPublicKey.PublicKey());
            
            Console.WriteLine("Encrypt and store results...");
            var source = new StreamSource(input);
            var sink = new StreamSink(output);
            virgilStreamCipher.Encrypt(source, sink, true);
            
            Console.WriteLine("Encrypted data is successfully stored in the output file...");
        }
    }
}</code></pre>

        <h2 id="decrypt-data">Decrypt Data</h2>
        <p>
            The following example illustrates the decryption of encrypted data by public key.
        </p>

        <p>Source code example: <a href="https://github.com/VirgilSecurity/virgil-net/blob/master/Virgil.Samples/Samples/DecryptSample.cs">DecryptSample.cs</a></p>
        <pre><code class="language-csharp">public static void Run()
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
            virgilStreamCipher.DecryptWithKey(source, sink, virgilPublicKey.Id().CertificateId(), privateKey, password);
            Console.WriteLine("Decrypted data is successfully stored in the output file...");
        }
    }
}</code></pre>

        <h2 id="sign-data">Sign Data</h2>
        <p>
            Cryptographic digital signatures use public key algorithms to provide data integrity. When you sign
            data with a digital signature, someone else can verify the signature, and can prove that the data
            originated from you and was not altered after you signed it.
        </p>
        <p>The following example applies a digital signature to public key identifier.</p>

        <p>Source code example: <a href="https://github.com/VirgilSecurity/virgil-net/blob/master/Virgil.Samples/Samples/SignSample.cs">SignSample.cs</a></p>
        <pre><code class="language-csharp">public static void Run()
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

        <p>Source code example: <a href="https://github.com/VirgilSecurity/virgil-net/blob/master/Virgil.Samples/Samples/VerifySample.cs">VerifySample.cs</a></p>
        <pre><code class="language-csharp"> private static void Main()
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
