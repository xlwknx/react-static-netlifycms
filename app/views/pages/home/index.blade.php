@section('title')
    Virgil | Home
@show

@section('slider')
<section class="home-slider container">
    <div class="home-slider-slide secure-the-future">
        <h2 class="home-slider-title">
            Secure the Future
        </h2>

        <div class="home-slider-description">
            Passwordless Authentication,<br/>
            Data Encryption and Data Integrity for your apps.<br/>
            Add in minutes. Benefit forever.
        </div>

        <a class="home-slider-get-started btn-virgil" href="/documents">
            GET STARTED
        </a>
    </div>

    <div class="hide home-slider-slide be-secure">
        <h2 class="home-slider-title">
            Be Secure
        </h2>
        <div class="home-slider-description">        
            Developers: Want to eliminate passwords, encrypt everything, in just hours,<br/>
            without having to become a security expert?
        </div>
        <a class="home-slider-get-started btn-virgil" href="/documents">
            GET STARTED
        </a>

        <div class="home-slider-platforms">
            <p>Available on most major platforms and for the most popular programming languages.</p>

            <div class="home-slider-platforms-col">
                <div>
                    <img src="/img/home/apple.png" title="Macintosh" />                    
                    <img src="/img/home/windows.png" title="Windows" />
                    <img src="/img/home/ios.png" title="iOS" />
                    <img src="/img/home/android.png" title="Android" />
                </div>
                <div>
                    <img src="/img/home/linux.png" title="Linux" />
                    <img src="/img/home/bsd.png" title="BSD" />
                    <img src="/img/home/chrome.png" title="Chrome" />
                    <img src="/img/home/firefox.png" title="Firefox" />
                </div>
            </div>

            <div class="home-slider-platforms-col right">
                <div>                
                    <img src="/img/home/archruby.png" title="C/C++" /></a>
                    <img src="/img/home/c_sharp.png" title="C#/.NET" />                    
                    <img src="/img/home/objc.png" title="Objective C" /></a>                    
                    <img src="/img/home/php.png" title="PHP" /></a>
                </div>
                <div>                
                    <img src="/img/home/nodecasts.png" title="Python" />
                    <img src="/img/home/as.png" title="AS" />
                    <img src="/img/home/nodejs.png" title="NodeJS" />
                    <img src="/img/home/ruby.png" title="Ruby" /></a>
                </div>
            </div>
        </div>
    </div>

    <div class="hide home-slider-slide internet-of-things">
        <h2 class="home-slider-title">
            Internet of Things
        </h2>

        <div class="home-slider-description">
            Virgil Security provides a simple, open-source, security layer for<br/>
            everything connected to the Internet.<br/>
            Do you have IoT devices or a cloud service?<br/>
            Secure them with Virgil.
        </div>

        <div class="home-slider-or-buttons">
            <a href="/contact-us" class="home-slider-get-started btn-virgil btn-transparent">
                CONTACT US
            </a>
            <span class="or">or</span>
            <a class="home-slider-get-started btn-virgil" href="/documents">
                GET STARTED
            </a>
        </div>
    </div>

    <div class="hide home-slider-slide ppu">
        <h2 class="home-slider-title">
            Pervasive, persistent, universal data<br/>
            security for your Enterprise
        </h2>

        <div class="home-slider-description">
            Integrate with your business processes. Work with Virgil-enabled apps.<br/>
            Breach no longer means data loss. Protect yourself from insider threats.
        </div>

        <div class="home-slider-or-buttons">
            <a href="/contact-us" class="home-slider-get-started btn-virgil btn-transparent">
                CONTACT US
            </a>
            <span class="or">or</span>
            <a class="home-slider-get-started btn-virgil" href="/documents">
                GET STARTED
            </a>
        </div>
    </div>

    <div class="hide home-slider-slide without-password">
        <h2 class="home-slider-title">
            Authentication without passwords
        </h2>

        <div class="home-slider-description">
            Your device is your key. Support any application in minutes. Plugins for major<br/>
            content management systems. Need to support a different platform…?
        </div>

        <div class="home-slider-or-buttons">
            <a href="/contact-us" class="home-slider-get-started btn-virgil btn-transparent">
                CONTACT US
            </a>
            <span class="or">or build it yourself in just a few minutes.</span>
        </div>

        <div class="engines">
            <a href="https://github.com/VirgilSecurity/VirgilPlugins/tree/master/wordpress/virgil_pass" title="Wordpress" target="_blank"><img src="/img/home/wordpress.png" /></a>
            <a href="https://github.com/VirgilSecurity/VirgilPlugins/tree/master/joomla" title="Joomla" target="_blank"><img src="/img/home/joomla.png" /></a>
            <a href="https://github.com/VirgilSecurity/VirgilPlugins/tree/master/drupal/mod_virgil_auth" title="Drupal" target="_blank"><img src="/img/home/drupal.png" /></a>
            <a href="https://github.com/VirgilSecurity/VirgilPlugins/tree/master/phpbb/virgil/pass" title="phpBB" target="_blank"><img src="/img/home/phpbb.png" /></a>
            <a href="https://github.com/VirgilSecurity/VirgilPlugins/tree/master/vanillaforum/VirgilPass" title="Vanilla" target="_blank"><img src="/img/home/vanilla.png" /></a>
        </div>
    </div>

    <div class="hide home-slider-slide secure-cloud">
        <h2 class="home-slider-title">
            Secure your cloud applications<br/>
            with passwordless authentication and<br/>
            end-to-end encryption
        </h2>

        <div class="home-slider-description">
            Build end-to-end encryption into your cloud infrastructure, secure your<br/>
            data at rest, and protect your clients from unauthorized access.<br/>
        </div>
    </div>
</section>
@show

@section('content')
<div class="page home">

    <section class="home-features cover">
        <div class="container">
            <div class="home-features-feature f1 first" data-index="1">
                <img src="/img/home/developers.png" alt="feature" />
            </div>

            <div class="home-features-feature f1 active hide first" data-index="1">
                <img src="/img/home/developers-active.png" alt="feature" />
            </div>

            <div class="home-features-feature f2" data-index="2">
                <img src="/img/home/iot.png" alt="feature"   />
            </div>

            <div class="home-features-feature f2 active hide" data-index="2">
                <img src="/img/home/iot-active.png" alt="feature"  />
            </div>

            <div class="home-features-feature f3" data-index="3">
                <img src="/img/home/enterprise.png" alt="feature"  />
            </div>

            <div class="home-features-feature f3 active hide" data-index="3">
                <img src="/img/home/enterprise-active.png" alt="feature" />
            </div>

            <div class="home-features-feature f4" data-index="4">
                <img src="/img/home/identity.png" alt="feature" />
            </div>

            <div class="home-features-feature f4 active hide" data-index="4">
                <img src="/img/home/identity-active.png" alt="feature" />
            </div>

            <div class="home-features-feature f5" data-index="5">
                <img src="/img/home/cloud.png" alt="feature" />
            </div>

            <div class="home-features-feature f5 active hide" data-index="5">
                <img src="/img/home/cloud-active.png" alt="feature" />
            </div>
        </div>
    </section>

    <div class="home-bottom-block">
        <section class="home-downloads container">
            <h3 class="home-downloads-title">
                Protect everything, everywhere, always.<br/>
                Use Virgil to get there.
            </h3>

            <div class="home-downloads-description">
                Check out our apps
            </div>

            <a href="/downloads" class="home-downloads-btn btn-virgil btn-transparent">DOWNLOADS</a>
        </section>

        <section class="home-features-expanded container">
            <div class="home-features-expanded-col">
                <div class="home-features-expanded-item">
                    <div class="home-features-expanded-item-icon">
                        <img src="/img/home/feature-next-gen-sec.png" />
                    </div>
                    <div class="home-features-expanded-item-description">
                        <h4>Drop next generation security into your<br/>application.</h4>
                        <p>Your customers deserve the best security. Add it without having to become a security expert yourself.</p>
                    </div>
                </div>
                <div class="home-features-expanded-item">
                    <div class="home-features-expanded-item-icon">
                        <img src="/img/home/feature-identities.png" />
                    </div>
                    <div class="home-features-expanded-item-description">
                        <h4>Verify Identities.</h4>
                        <p>Identity made simple and without passwords.</p>
                    </div>
                </div>
            </div>
            <div class="home-features-expanded-col right">
                <div class="home-features-expanded-item">
                    <div class="home-features-expanded-item-icon">
                        <img src="/img/home/feature-data-enc.png" />
                    </div>
                    <div class="home-features-expanded-item-description">
                        <h4>Encrypt data both at rest and in transit.</h4>
                        <p>All data should be secure all the time. You and your customers deserve it.</p>
                    </div>
                </div>
                <div class="home-features-expanded-item">
                    <div class="home-features-expanded-item-icon">
                        <img src="/img/home/feature-sec-in-min.png" />
                    </div>
                    <div class="home-features-expanded-item-description">
                        <h4>Implement security in minutes.</h4>
                        <p>We support the platforms and languages you know and love.</p>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

<script src="/dist/public.js"></script>
@stop
