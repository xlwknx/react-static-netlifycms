---
_fieldset: page
title: What is Virgil
_template: page
---

<div class="content">
    <section class="what-is-virgil wrapper">
        <div class="container">
            <h3 class="title">What is Virgil</h3>
            <div class="diagram-wrapper">
                <img src="{{ theme:img src='virgil-stack.svg' }}" alt="Virgil Security Stack" />
            </div>
            <div class="text-left row">
                <div class="column-wrapper col-xs-40 col-xs-offset-4 col-md-24 col-md-offset-0">
                    <ul class="feature-list">
                        <li class="feature-item">Everything you need to deploy end to end security in your application. </li>
                        <li class="feature-item">Open Source, modern, transparent cryptography with support from Virgil and ARM. </li>
                        <li class="feature-item">Support for most modern development languages  and platforms.</li>
                    </ul>
                </div>
                <div class="column-wrapper col-xs-40 col-xs-offset-4 col-md-24 col-md-offset-0">
                    <ul class="feature-list">
                        <li class="feature-item">Embedded applications support: ARM Cortex M0 and other deeply embedded systems. </li>
                        <li class="feature-item">Global, verifiable, flexible key infrastructure.</li>
                        <li class="feature-item">World’s most agile security engine with per datagram crypto agility.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="ip-messaging wrapper">
        <div class="container">
            <h3 class="title">IP Messaging with Virgil Security</h3>
            <div class="diagram-wrapper">
                <img src="{{ theme:img src='ip-messaging.svg' }}" alt="IP Messaging Diagram" />
            </div>
        </div>
    </section>

    <section class="encryption-diagram wrapper">
        <div class="container">
            <h3 class="title">ECIES encryption functional diagram</h3>
            <div class="diagram-wrapper">
                <img src="{{ theme:img src='encryption-diagram.svg' }}" alt="ECIES Encryption Diagram" />
            </div>
        </div>
    </section>
    
    <section class="decryption-diagram wrapper">
        <div class="container">
            <h3 class="title">ECIES decryption functional diagram</h3>
            <div class="diagram-wrapper">
                <img src="{{ theme:img src='decryption-diagram.svg' }}" alt="ECIES Decryption Diagram" />
            </div>
            <div class="text-left row">
                <div class="column-wrapper col-xs-40 col-xs-offset-4 col-md-24 col-md-offset-0">
                    <h4 class="text-content-header">Ephemeral key pair generation</h4>
                    <p class="text-content">Input parameters:</p>
                    <ul class="feature-list">
                        <li class="feature-item">Random number generation function - NIST SP 800-901: CTR_DRBG (Counter-mode block-cipher-based Deterministic Random Bit Generator). The underlying algorithm used is AES-256 in counter mode.</li>
                        <li class="feature-item">Random number generation function “Personalization String” parameter - module id string (see section 8.7.1 of <a href="https://en.wikipedia.org/wiki/NIST_SP_800-90A">NIST Special Publication 800-90A</a>).</li>
                        <li class="feature-item">Entropy function - on linux:/dev/urandom and on Windows: CryptGenRandom(), with high resolution timer (rdtsc) and HAVEGE.</li>
                        <li class="feature-item">Some high level languages do not support strong random number generation due to absence of hardware instructions.</li>
                    </ul>
                </div>
                <div class="column-wrapper col-xs-40 col-xs-offset-4 col-md-24 col-md-offset-0">
                    <h4 class="text-content-header">Key Agreement</h4>
                    <p class="text-content">Key Agreement – function used for the generation of a shared secret by two parties. <a href="https://en.wikipedia.org/wiki/Mbed_TLS">ARM mbed TLS</a> is used.</p>
                    <h4 class="text-content-header">Key Derivation function</h4>
                    <p class="text-content">Key Derivation function – mechanism produces a set of keys from keying material and some optional parameters.<br><br>Virgil implementation of KDF1 described in ISO-18033-2 Clause 6.2.2 is used. Underlying hash function is SHA-384.</p>
                    <h4 class="text-content-header">Symmetric encryption algorithm</h4>
                    <p class="text-content">ARM mbed TLS implementation of AES256-CBC mode is used.</p>
                    <h4 class="text-content-header">Message Authentication Code</h4>
                    <p class="text-content">Message Authentication Code  – data used in order to authenticate messages.<br><br>ARM mbed TLS implementation of HMAC-SHA384.</p>
                </div>
            </div>
            <div id="what-virgil-uses">
                <h3 class="title ">What Virgil Uses</h3>
                <div class="text-left row">
                    <div class="column-wrapper col-xs-40 col-xs-offset-4 col-md-24 col-md-offset-0">
                        <h4 class="text-content-header">Virgil ECIES Defaults</h4>
                        <table class="table-content table table-striped">
                            <tbody>
                                <tr>
                                    <td class="term">Description</td>
                                    <td class="value">AES256</td>
                                </tr>
                                <tr>
                                    <td class="term">Elliptic curve</td>
                                    <td class="value">Brainpool 512</td>
                                </tr>
                                <tr>
                                    <td class="term">Hashing</td>
                                    <td class="value">SHA384</td>
                                </tr>
                                <tr>
                                    <td class="term">Signature</td>
                                    <td class="value">ECDSA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="column-wrapper col-xs-40 col-xs-offset-4 col-md-24 col-md-offset-0">
                        <h4 class="text-content-header">Virgil Framework</h4>
                        <table class="table-content table table-striped">
                            <tbody>
                                <tr>
                                    <td class="term">Cryptographic message syntax</td>
                                    <td class="value">RFC 5652</td>
                                </tr>
                                <tr>
                                    <td class="term">Encryption</td>
                                    <td class="value">ISO 18033-2, SECG SEC1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-left row">
                    <div class="column-wrapper col-xs-40 col-xs-offset-4 col-md-24 col-md-offset-0">
                        <h4 class="text-content-header">Cryptography Functions</h4>
                        <table class="table-content table table-striped">
                            <tbody>
                                <tr>
                                    <td class="term">Key generation</td>
                                    <td class="value">CTR-DRBG, NIST SP 800-90A</td>
                                </tr>
                                <tr>
                                    <td class="term">Key derivation</td>
                                    <td class="value">KDF1, ISO-18033-2  Clause 6.2.2</td>
                                </tr>
                                <tr>
                                    <td class="term">Entropy source</td>
                                    <td class="value">Platform dependent,  multi source support</td>
                                </tr>
                                <tr>
                                    <td class="term">Key exchange (EC)</td>
                                    <td class="value">ECDH, NIST SP 800-56A</td>
                                </tr><tr>
                                    <td class="term">Key exchange (RSA)</td>
                                    <td class="value">NIST SP 800-56B rev 1</td>
                                </tr><tr>
                                    <td class="term">Signature</td>
                                    <td class="value">ECDSA, EdDSA (available soon)</td>
                                </tr><tr>
                                    <td class="term">Hashing</td>
                                    <td class="value">SHA-2, FIPS Pub 180-4</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                    <div class="column-wrapper col-xs-40 col-xs-offset-4 col-md-24 col-md-offset-0">
                        <h4 class="text-content-header">&nbsp;</h4>
                        <table class="table-content table table-striped">
                            <tbody>
                                <tr>
                                    <td class="term">Symmetric (AES)</td>
                                    <td class="value">AES, FIPS Pub 197,  GOST 28147-89</td>
                                </tr>
                                <tr>
                                    <td class="term">Asymmetric (EC)</td>
                                    <td class="value">
                                        <strong>Brainpool</strong>
                                        <br>
                                        <span>bp256r1, bp384r1,  bp512r1</span>
                                        <br>
                                        <br>
                                        <strong>Koblitz</strong>
                                        <br>
                                        <span>secp192k1, secp224k1,  secp256k1 </span>
                                        <br>
                                        <br>
                                        <strong>NIST</strong>
                                        <br>
                                        <span>secp192r1, secp224r1,  secp256r1, secp384r1,  secp521r1</span>
                                        <br>
                                        <br>
                                        <strong>Curve 25519</strong>
                                        <br>
                                        <span>(available soon)</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>