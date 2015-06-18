@section('title')
Virgil | Developers | C/C++ | Quickstart
@show

@section('header-block')
    <div class="dev-header-container">
        <div class="container">
            <h1 class="text-left">Getting started with C/C++</h1>
            <h3 class="text-left">This documentation helps you to star developing secure apps using Virgil services</h3>        
        </div>        
    </div>    
    @include('pages.public.documents.cpp.partial.header')
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
                <p>Full source code examples available on <a href="https://github.com/VirgilSecurity/virgil-cpp/tree/master/examples">GitHub</a> in public access.</p>
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
		            <li><a href="/documents/cpp/downloads">Download</a> from our web site</li>
		            <li><a href="/documents/cpp/crypto-lib#build">Build</a> by yourself</li>
		        </ol>
		       
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
		                <a href="/documents/cpp/keys-service">Keys Service</a>.
		            </footer>
		        </blockquote>
		        <p>
		            The following code example creates a new public/private key pair.
		        </p>
                    <pre><code class="language-cpp">#include &lt;fstream&gt;
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
        std::copy(publicKey.begin(), publicKey.end(), std::ostreambuf_iterator&lt;char&gt;(publicKeyStream));

        std::cout << "Store private key: new_private.key ..." << std::endl;
        std::ofstream privateKeyStream("new_private.key", std::ios::out | std::ios::binary);
        if (!privateKeyStream.good()) {
            throw std::runtime_error("can not write file: new_private.key");
        }
        VirgilByteArray privateKey = newKeyPair.privateKey();
        std::copy(privateKey.begin(), privateKey.end(), std::ostreambuf_iterator&lt;char&gt;(privateKeyStream));
    } catch (std::exception& exception) {
        std::cerr << "Error: " << exception.what() << std::endl;
    }
    return 0;
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
        		<pre><code class="language-cpp">#include &lt;iostream&gt;
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

#define VIRGIL_PKI_URL_BASE &quot;https://pki.virgilsecurity.com/v1/&quot;
#define VIRGIL_PKI_APP_KEY &quot;xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx&quot;
#define USER_ID_TYPE &quot;email&quot;
#define USER_ID &quot;test.virgilsecurity@mailinator.com&quot;

#define MAKE_URL(base, path) (base path)

static int pki_callback(char *data, size_t size, size_t nmemb, std::string *buffer_in) {
    // Is there anything in the buffer?
    if (buffer_in != NULL) {
        // Append the data to the buffer
        buffer_in-&gt;append(data, size * nmemb);
        return size * nmemb;
    }
    return 0;
}

static std::string pki_post(const std::string&amp; url, const std::string&amp; json) {
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
        headers = curl_slist_append(headers, &quot;Accept: application/json&quot;);
        headers = curl_slist_append(headers, &quot;Content-Type: application/json&quot;);
        headers = curl_slist_append(headers, &quot;X-VIRGIL-APP-TOKEN: &quot; VIRGIL_PKI_APP_KEY);
        /* Set the URL */
        curl_easy_setopt(curl, CURLOPT_URL, url.c_str());
        /* Now specify the POST data */
        curl_easy_setopt(curl, CURLOPT_CUSTOMREQUEST, &quot;POST&quot;);
        curl_easy_setopt(curl, CURLOPT_HTTPHEADER, headers);

        curl_easy_setopt(curl, CURLOPT_COPYPOSTFIELDS, json.c_str());

        curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, pki_callback);
        curl_easy_setopt(curl, CURLOPT_WRITEDATA, (void *)(&amp;response));

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
        throw std::runtime_error(std::string(&quot;cURL failed with error: &quot;) + curl_easy_strerror(result));
    }
}

VirgilCertificate
pki_create_user(const VirgilByteArray&amp; publicKey, const std::map&lt;std::string, std::string&gt;&amp; ids) {
    // Create request
    Json::Value payload;
    payload[&quot;public_key&quot;] = VirgilBase64::encode(publicKey);
    Json::Value userData(Json::arrayValue);
    for (std::map&lt;std::string, std::string&gt;::const_iterator id = ids.begin(); id != ids.end(); ++id) {
        Json::Value data(Json::objectValue);
        data[&quot;class&quot;] = &quot;user_id&quot;;
        data[&quot;type&quot;] = id-&gt;first;
        data[&quot;value&quot;] = id-&gt;second;
        userData.append(data);
    }
    payload[&quot;user_data&quot;] = userData;
    // Perform request
    std::string response = pki_post(MAKE_URL(VIRGIL_PKI_URL_BASE, &quot;public-key&quot;),
            Json::FastWriter().write(payload));
    // Parse response
    Json::Reader reader(Json::Features::strictMode());
    Json::Value responseObject;
    if (!reader.parse(response, responseObject)) {
        throw VirgilException(reader.getFormattedErrorMessages());
    }
    const Json::Value&amp; accountIdObject = responseObject[&quot;id&quot;][&quot;account_id&quot;];
    const Json::Value&amp; publicKeyIdObject = responseObject[&quot;id&quot;][&quot;public_key_id&quot;];

    if (accountIdObject.isString() &amp;&amp; publicKeyIdObject.isString()) {
        VirgilCertificate virgilPublicKey(publicKey);
        virgilPublicKey.id().setAccountId(virgil::str2bytes(accountIdObject.asString()));
        virgilPublicKey.id().setCertificateId(virgil::str2bytes(publicKeyIdObject.asString()));
        return virgilPublicKey;
    } else {
        throw std::runtime_error(std::string(&quot;Unexpected response format:\n&quot;) + responseObject.toStyledString());
    }
}

int main() {
    try {
        std::cout &lt;&lt; &quot;Prepare input file: public.key...&quot; &lt;&lt; std::endl;
        std::ifstream inFile(&quot;public.key&quot;, std::ios::in | std::ios::binary);
        if (!inFile.good()) {
            throw std::runtime_error(&quot;can not read file: public.key&quot;);
        }

        std::cout &lt;&lt; &quot;Prepare output file: virgil_public.key...&quot; &lt;&lt; std::endl;
        std::ofstream outFile(&quot;virgil_public.key&quot;, std::ios::out | std::ios::binary);
        if (!outFile.good()) {
            throw std::runtime_error(&quot;can not write file: virgil_public.key&quot;);
        }

        std::cout &lt;&lt; &quot;Read public key...&quot; &lt;&lt; std::endl;
        VirgilByteArray publicKey;
        std::copy(std::istreambuf_iterator&lt;char&gt;(inFile), std::istreambuf_iterator&lt;char&gt;(),
                std::back_inserter(publicKey));

        std::cout &lt;&lt; &quot;Create user (&quot; &lt;&lt; USER_ID &lt;&lt; &quot;) account on the Virgil PKI service...&quot; &lt;&lt; std::endl;
        std::map&lt;std::string, std::string&gt; userIds;
        userIds[USER_ID_TYPE] = USER_ID;
        VirgilCertificate virgilPublicKey = pki_create_user(publicKey, userIds);

        std::cout &lt;&lt; &quot;Store virgil public key to the output file...&quot; &lt;&lt; std::endl;
        VirgilByteArray virgilPublicKeyData = virgilPublicKey.toAsn1();
        std::copy(virgilPublicKeyData.begin(), virgilPublicKeyData.end(), std::ostreambuf_iterator&lt;char&gt;(outFile));
    } catch (std::exception&amp; exception) {
        std::cerr &lt;&lt; &quot;Error: &quot; &lt;&lt; exception.what() &lt;&lt; std::endl;
    }
    return 0;
}</code></pre>

		<h2 id="get-public-key">Get Public Key</h2>
        <p>
            Get public key from Public Keys Service.
        </p>
        <pre><code class="language-cpp">#include &lt;cstddef&gt;
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

#define VIRGIL_PKI_URL_BASE &quot;https://pki.virgilsecurity.com/v1/&quot;
#define VIRGIL_PKI_APP_KEY &quot;xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx&quot;
#define USER_ID_TYPE &quot;email&quot;
#define USER_ID &quot;test.virgilsecurity@mailinator.com&quot;

#define MAKE_URL(base, path) (base path)

static int pki_callback(char *data, size_t size, size_t nmemb, std::string *buffer_in) {
    // Is there anything in the buffer?
    if (buffer_in != NULL) {
        // Append the data to the buffer
        buffer_in-&gt;append(data, size * nmemb);
        return size * nmemb;
    }
    return 0;
}

static std::string pki_post(const std::string&amp; url, const std::string&amp; json) {
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
        headers = curl_slist_append(headers, &quot;Accept: application/json&quot;);
        headers = curl_slist_append(headers, &quot;Content-Type: application/json&quot;);
        headers = curl_slist_append(headers, &quot;X-VIRGIL-APP-TOKEN: &quot; VIRGIL_PKI_APP_KEY);
        /* Set the URL */
        curl_easy_setopt(curl, CURLOPT_URL, url.c_str());
        /* Now specify the POST data */
        curl_easy_setopt(curl, CURLOPT_CUSTOMREQUEST, &quot;POST&quot;);
        curl_easy_setopt(curl, CURLOPT_HTTPHEADER, headers);

        curl_easy_setopt(curl, CURLOPT_COPYPOSTFIELDS, json.c_str());

        curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, pki_callback);
        curl_easy_setopt(curl, CURLOPT_WRITEDATA, (void *)(&amp;response));

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
        throw std::runtime_error(std::string(&quot;cURL failed with error: &quot;) + curl_easy_strerror(result));
    }
}

VirgilCertificate pki_get_public_key(const std::string&amp; userIdType, const std::string&amp; userId) {
    // Create request
    Json::Value payload;
    payload[userIdType] = userId;
    // Perform request
    std::string response = pki_post(MAKE_URL(VIRGIL_PKI_URL_BASE, &quot;account/actions/search&quot;),
            Json::FastWriter().write(payload));
    // Parse response
    Json::Reader reader(Json::Features::strictMode());
    Json::Value responseObject;
    if (!reader.parse(response, responseObject)) {
        throw std::runtime_error(reader.getFormattedErrorMessages());
    }
    const Json::Value&amp; virgilPublicKeyObject = responseObject[0][&quot;public_keys&quot;][0];
    const Json::Value&amp; idObject = virgilPublicKeyObject[&quot;id&quot;][&quot;public_key_id&quot;];
    const Json::Value&amp; publicKeyObject = virgilPublicKeyObject[&quot;public_key&quot;];

    if (idObject.isString() &amp;&amp; publicKeyObject.isString()) {
        VirgilCertificate virgilPublicKey(VirgilBase64::decode(publicKeyObject.asString()));
        virgilPublicKey.id().setCertificateId(virgil::str2bytes(idObject.asString()));
        return virgilPublicKey;
    } else {
        throw std::runtime_error(std::string(&quot;virgil public key for recipient &#39;&quot;) + userId +
                &quot;&#39; of type &#39;&quot; + userIdType + &quot;&#39; not found&quot;);
    }
}

int main() {
    try {
        std::cout &lt;&lt; &quot;Get user (&quot;&lt;&lt; USER_ID &lt;&lt; &quot;) information from the Virgil PKI service...&quot; &lt;&lt; std::endl;
        VirgilCertificate virgilPublicKey = pki_get_public_key(USER_ID_TYPE, USER_ID);

        std::cout &lt;&lt; &quot;Prepare output file: virgil_public.key...&quot; &lt;&lt; std::endl;
        std::ofstream outFile(&quot;virgil_public.key&quot;, std::ios::out | std::ios::binary);
        if (!outFile.good()) {
            throw std::runtime_error(&quot;can not write file: virgil_public.key&quot;);
        }

        std::cout &lt;&lt; &quot;Store virgil public key to the output file...&quot; &lt;&lt; std::endl;
        VirgilByteArray virgilPublicKeyData = virgilPublicKey.toAsn1();
        std::copy(virgilPublicKeyData.begin(), virgilPublicKeyData.end(), std::ostreambuf_iterator&lt;char&gt;(outFile));
    } catch (std::exception&amp; exception) {
        std::cerr &lt;&lt; &quot;Error: &quot; &lt;&lt; exception.what() &lt;&lt; std::endl;
    }
    return 0;
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
        <pre><code class="language-cpp">#include &lt;cstddef&gt;
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

#define VIRGIL_PKI_URL_BASE &quot;https://pki.virgilsecurity.com/v1/&quot;
#define VIRGIL_PKI_APP_KEY &quot;xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx&quot;
#define USER_ID_TYPE &quot;email&quot;
#define USER_ID &quot;test.virgilsecurity@mailinator.com&quot;

#define MAKE_URL(base, path) (base path)

static int pki_callback(char *data, size_t size, size_t nmemb, std::string *buffer_in) {
    // Is there anything in the buffer?
    if (buffer_in != NULL) {
        // Append the data to the buffer
        buffer_in-&gt;append(data, size * nmemb);
        return size * nmemb;
    }
    return 0;
}

static std::string pki_post(const std::string&amp; url, const std::string&amp; json) {
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
        headers = curl_slist_append(headers, &quot;Accept: application/json&quot;);
        headers = curl_slist_append(headers, &quot;Content-Type: application/json&quot;);
        headers = curl_slist_append(headers, &quot;X-VIRGIL-APP-TOKEN: &quot; VIRGIL_PKI_APP_KEY);
        /* Set the URL */
        curl_easy_setopt(curl, CURLOPT_URL, url.c_str());
        /* Now specify the POST data */
        curl_easy_setopt(curl, CURLOPT_CUSTOMREQUEST, &quot;POST&quot;);
        curl_easy_setopt(curl, CURLOPT_HTTPHEADER, headers);

        curl_easy_setopt(curl, CURLOPT_COPYPOSTFIELDS, json.c_str());

        curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, pki_callback);
        curl_easy_setopt(curl, CURLOPT_WRITEDATA, (void *)(&amp;response));

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
        throw std::runtime_error(std::string(&quot;cURL failed with error: &quot;) + curl_easy_strerror(result));
    }
}

VirgilCertificate pki_get_public_key(const std::string&amp; userIdType, const std::string&amp; userId) {
    // Create request
    Json::Value payload;
    payload[userIdType] = userId;
    // Perform request
    std::string response = pki_post(MAKE_URL(VIRGIL_PKI_URL_BASE, &quot;account/actions/search&quot;),
            Json::FastWriter().write(payload));
    // Parse response
    Json::Reader reader(Json::Features::strictMode());
    Json::Value responseObject;
    if (!reader.parse(response, responseObject)) {
        throw std::runtime_error(reader.getFormattedErrorMessages());
    }
    const Json::Value&amp; virgilPublicKeyObject = responseObject[0][&quot;public_keys&quot;][0];
    const Json::Value&amp; idObject = virgilPublicKeyObject[&quot;id&quot;][&quot;public_key_id&quot;];
    const Json::Value&amp; publicKeyObject = virgilPublicKeyObject[&quot;public_key&quot;];

    if (idObject.isString() &amp;&amp; publicKeyObject.isString()) {
        VirgilCertificate virgilPublicKey(VirgilBase64::decode(publicKeyObject.asString()));
        virgilPublicKey.id().setCertificateId(virgil::str2bytes(idObject.asString()));
        return virgilPublicKey;
    } else {
        throw std::runtime_error(std::string(&quot;virgil public key for recipient &#39;&quot;) + userId +
                &quot;&#39; of type &#39;&quot; + userIdType + &quot;&#39; not found&quot;);
    }
}

int main() {
    try {
        std::cout &lt;&lt; &quot;Prepare input file: test.txt...&quot; &lt;&lt; std::endl;
        std::ifstream inFile(&quot;test.txt&quot;, std::ios::in | std::ios::binary);
        if (!inFile.good()) {
            throw std::runtime_error(&quot;can not read file: test.txt&quot;);
        }

        std::cout &lt;&lt; &quot;Prepare output file: test.txt.enc...&quot; &lt;&lt; std::endl;
        std::ofstream outFile(&quot;test.txt.enc&quot;, std::ios::out | std::ios::binary);
        if (!outFile.good()) {
            throw std::runtime_error(&quot;can not write file: test.txt.enc&quot;);
        }

        std::cout &lt;&lt; &quot;Initialize cipher...&quot; &lt;&lt; std::endl;
        VirgilStreamCipher cipher;

        std::cout &lt;&lt; &quot;Get recipient (&quot;&lt;&lt; USER_ID &lt;&lt; &quot;) information from the Virgil PKI service...&quot; &lt;&lt; std::endl;
        VirgilCertificate virgilPublicKey = pki_get_public_key(USER_ID_TYPE, USER_ID);
        std::cout &lt;&lt; &quot;Add recipient...&quot; &lt;&lt; std::endl;
        cipher.addKeyRecipient(virgilPublicKey.id().certificateId(), virgilPublicKey.publicKey());

        std::cout &lt;&lt; &quot;Encrypt and store results...&quot; &lt;&lt; std::endl;
        VirgilStreamDataSource dataSource(inFile);
        VirgilStreamDataSink dataSink(outFile);
        cipher.encrypt(dataSource, dataSink, true);

        std::cout &lt;&lt; &quot;Encrypted data is successfully stored in the output file...&quot; &lt;&lt; std::endl;
    } catch (std::exception&amp; exception) {
        std::cerr &lt;&lt; &quot;Error: &quot; &lt;&lt; exception.what() &lt;&lt; std::endl;
    }
    return 0;
}</code></pre>

        <h2 id="sign-data">Sign Data</h2>
        <p>
            Cryptographic digital signatures use public key algorithms to provide data integrity. When you sign
            data with a digital signature, someone else can verify the signature, and can prove that the data
            originated from you and was not altered after you signed it.
        </p>
        <p>The following example applies a digital signature to public key identifier.</p>

        <pre><code class="language-cpp">#include &lt;iostream&gt;
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
        std::cout &lt;&lt; &quot;Prepare input file: test.txt...&quot; &lt;&lt; std::endl;
        std::ifstream inFile(&quot;test.txt&quot;, std::ios::in | std::ios::binary);
        if (!inFile.good()) {
            throw std::runtime_error(&quot;can not read file: test.txt&quot;);
        }

        std::cout &lt;&lt; &quot;Prepare output file: test.txt.sign...&quot; &lt;&lt; std::endl;
        std::ofstream outFile(&quot;test.txt.sign&quot;, std::ios::out | std::ios::binary);
        if (!outFile.good()) {
            throw std::runtime_error(&quot;can not write file: test.txt.sign&quot;);
        }

        std::cout &lt;&lt; &quot;Read virgil public key...&quot; &lt;&lt; std::endl;
        VirgilCertificate virgilPublicKey = virgil::stream::read_certificate(&quot;virgil_public.key&quot;);

        std::cout &lt;&lt; &quot;Read private key...&quot; &lt;&lt; std::endl;
        std::ifstream keyFile(&quot;private.key&quot;, std::ios::in | std::ios::binary);
        if (!keyFile.good()) {
            throw std::runtime_error(&quot;can not read private key: private.key&quot;);
        }
        VirgilByteArray privateKey;
        std::copy(std::istreambuf_iterator&lt;char&gt;(keyFile), std::istreambuf_iterator&lt;char&gt;(),
                std::back_inserter(privateKey));
        VirgilByteArray privateKeyPassword = virgil::str2bytes(&quot;password&quot;);

        std::cout &lt;&lt; &quot;Initialize signer...&quot; &lt;&lt; std::endl;
        VirgilStreamSigner signer;

        std::cout &lt;&lt; &quot;Sign data...&quot; &lt;&lt; std::endl;
        VirgilStreamDataSource dataSource(inFile);
        VirgilSign sign = signer.sign(dataSource, virgilPublicKey.id().certificateId(),
                privateKey, privateKeyPassword);

        std::cout &lt;&lt; &quot;Save sign...&quot; &lt;&lt; std::endl;
        VirgilByteArray signData = sign.toAsn1();
        std::copy(signData.begin(), signData.end(), std::ostreambuf_iterator&lt;char&gt;(outFile));

        std::cout &lt;&lt; &quot;Sign is successfully stored in the output file.&quot; &lt;&lt; std::endl;
    } catch (std::exception&amp; exception) {
        std::cerr &lt;&lt; &quot;Error: &quot; &lt;&lt; exception.what() &lt;&lt; std::endl;
    }
    return 0;
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

        <pre><code class="language-cpp">#include &lt;iostream&gt;
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

#define VIRGIL_PKI_URL_BASE &quot;https://pki.virgilsecurity.com/v1/&quot;
#define VIRGIL_PKI_APP_KEY &quot;xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx&quot;
#define SIGNER_ID_TYPE &quot;email&quot;
#define SIGNER_ID &quot;test.virgilsecurity@mailinator.com&quot;

#define MAKE_URL(base, path) (base path)

static int pki_callback(char *data, size_t size, size_t nmemb, std::string *buffer_in) {
    // Is there anything in the buffer?
    if (buffer_in != NULL) {
        // Append the data to the buffer
        buffer_in-&gt;append(data, size * nmemb);
        return size * nmemb;
    }
    return 0;
}

static std::string pki_post(const std::string&amp; url, const std::string&amp; json) {
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
        headers = curl_slist_append(headers, &quot;Accept: application/json&quot;);
        headers = curl_slist_append(headers, &quot;Content-Type: application/json&quot;);
        headers = curl_slist_append(headers, &quot;X-VIRGIL-APP-TOKEN: &quot; VIRGIL_PKI_APP_KEY);
        /* Set the URL */
        curl_easy_setopt(curl, CURLOPT_URL, url.c_str());
        /* Now specify the POST data */
        curl_easy_setopt(curl, CURLOPT_CUSTOMREQUEST, &quot;POST&quot;);
        curl_easy_setopt(curl, CURLOPT_HTTPHEADER, headers);

        curl_easy_setopt(curl, CURLOPT_COPYPOSTFIELDS, json.c_str());

        curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, pki_callback);
        curl_easy_setopt(curl, CURLOPT_WRITEDATA, (void *)(&amp;response));

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
        throw std::runtime_error(std::string(&quot;cURL failed with error: &quot;) + curl_easy_strerror(result));
    }
}

VirgilCertificate pki_get_public_key(const std::string&amp; userIdType, const std::string&amp; userId) {
    // Create request
    Json::Value payload;
    payload[userIdType] = userId;
    // Perform request
    std::string response = pki_post(MAKE_URL(VIRGIL_PKI_URL_BASE, &quot;account/actions/search&quot;),
            Json::FastWriter().write(payload));
    // Parse response
    Json::Reader reader(Json::Features::strictMode());
    Json::Value responseObject;
    if (!reader.parse(response, responseObject)) {
        throw std::runtime_error(reader.getFormattedErrorMessages());
    }
    const Json::Value&amp; virgilPublicKeyObject = responseObject[0][&quot;public_keys&quot;][0];
    const Json::Value&amp; idObject = virgilPublicKeyObject[&quot;id&quot;][&quot;public_key_id&quot;];
    const Json::Value&amp; publicKeyObject = virgilPublicKeyObject[&quot;public_key&quot;];

    if (idObject.isString() &amp;&amp; publicKeyObject.isString()) {
        VirgilCertificate virgilPublicKey(VirgilBase64::decode(publicKeyObject.asString()));
        virgilPublicKey.id().setCertificateId(virgil::str2bytes(idObject.asString()));
        return virgilPublicKey;
    } else {
        throw std::runtime_error(std::string(&quot;virgil public key for recipient &#39;&quot;) + userId +
                &quot;&#39; of type &#39;&quot; + userIdType + &quot;&#39; not found&quot;);
    }
}

int main() {
    try {
        std::cout &lt;&lt; &quot;Prepare input file: test.txt...&quot; &lt;&lt; std::endl;
        std::ifstream inFile(&quot;test.txt&quot;, std::ios::in | std::ios::binary);
        if (!inFile.good()) {
            throw std::runtime_error(&quot;can not read file: test.txt&quot;);
        }

        std::cout &lt;&lt; &quot;Read virgil sign...&quot; &lt;&lt; std::endl;
        VirgilSign virgilSign = virgil::stream::read_sign(&quot;test.txt.sign&quot;);

        std::cout &lt;&lt; &quot;Get signer (&quot;&lt;&lt; SIGNER_ID &lt;&lt; &quot;) information from the Virgil PKI service...&quot; &lt;&lt; std::endl;
        VirgilCertificate virgilPublicKey = pki_get_public_key(SIGNER_ID_TYPE, SIGNER_ID);

        std::cout &lt;&lt; &quot;Initialize verifier...&quot; &lt;&lt; std::endl;
        VirgilStreamSigner signer;

        std::cout &lt;&lt; &quot;Verify data...&quot; &lt;&lt; std::endl;
        VirgilStreamDataSource dataSource(inFile);
        bool verified = signer.verify(dataSource, virgilSign, virgilPublicKey.publicKey());

        std::cout &lt;&lt; &quot;Data is &quot; &lt;&lt; (verified ? &quot;&quot; : &quot;not &quot;) &lt;&lt; &quot;verified!&quot; &lt;&lt; std::endl;
    } catch (std::exception&amp; exception) {
        std::cerr &lt;&lt; &quot;Error: &quot; &lt;&lt; exception.what() &lt;&lt; std::endl;
    }
    return 0;
}</code></pre>

        <h2 id="decrypt-data">Decrypt Data</h2>
        <p>
            The following example illustrates the decryption of encrypted data by public key.
        </p>

        <pre><code class="language-csharp">#include &lt;iostream&gt;
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
        std::cout &lt;&lt; &quot;Prepare input file: test.txt.enc...&quot; &lt;&lt; std::endl;
        std::ifstream inFile(&quot;test.txt.enc&quot;, std::ios::in | std::ios::binary);
        if (!inFile.good()) {
            throw std::runtime_error(&quot;can not read file: test.txt.enc&quot;);
        }

        std::cout &lt;&lt; &quot;Prepare output file: decrypted_test.txt...&quot; &lt;&lt; std::endl;
        std::ofstream outFile(&quot;decrypted_test.txt&quot;, std::ios::out | std::ios::binary);
        if (!outFile.good()) {
            throw std::runtime_error(&quot;can not write file: decrypted_test.txt&quot;);
        }

        std::cout &lt;&lt; &quot;Initialize cipher...&quot; &lt;&lt; std::endl;
        VirgilStreamCipher cipher;

        std::cout &lt;&lt; &quot;Read virgil public key...&quot; &lt;&lt; std::endl;
        VirgilCertificate virgilPublicKey = virgil::stream::read_certificate(&quot;virgil_public.key&quot;);

        std::cout &lt;&lt; &quot;Read private key...&quot; &lt;&lt; std::endl;
        std::ifstream keyFile(&quot;private.key&quot;, std::ios::in | std::ios::binary);
        if (!keyFile.good()) {
            throw std::runtime_error(&quot;can not read private key: private.key&quot;);
        }
        VirgilByteArray privateKey;
        std::copy(std::istreambuf_iterator&lt;char&gt;(keyFile), std::istreambuf_iterator&lt;char&gt;(),
                std::back_inserter(privateKey));
        VirgilByteArray privateKeyPassword = virgil::str2bytes(&quot;password&quot;);

        std::cout &lt;&lt; &quot;Decrypt...&quot; &lt;&lt; std::endl;
        VirgilStreamDataSource dataSource(inFile);
        VirgilStreamDataSink dataSink(outFile);
        cipher.decryptWithKey(dataSource, dataSink, virgilPublicKey.id().certificateId(),
                privateKey, privateKeyPassword);
        std::cout &lt;&lt; &quot;Decrypted data is successfully stored in the output file...&quot; &lt;&lt; std::endl;
    } catch (std::exception&amp; exception) {
        std::cerr &lt;&lt; &quot;Error: &quot; &lt;&lt; exception.what() &lt;&lt; std::endl;
    }
    return 0;
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
