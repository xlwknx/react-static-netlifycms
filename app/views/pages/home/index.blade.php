@section('title')
    Virgil | Home
@show

@section('slider')
<section class="home-slider container">
    <div class="home-slider-slide secure-the-future">
        <h2 class="home-slider-title">
            Secure The Future
        </h2>

        <div class="home-slider-description">
            Passwordless Authentication,<br/>
            Data Encryption and Data Integrity for your apps.<br/>
            Add in minutes. Benefit forever.
        </div>

        <a class="home-slider-get-started btn-virgil" href="/dashboard">
            GET STARTED
        </a>
    </div>

    <div class="hide home-slider-slide be-secure">
        <h2 class="home-slider-title">
            Be Secure
        </h2>
        <div class="home-slider-description">
            Developers: want to eliminate passwotrds, encrypt everything, in hours,<br/>
            without having to become security expert?
        </div>
        <a class="home-slider-get-started btn-virgil" href="/dashboard">
            GET STARTED
        </a>
        <div class="home-slider-platforms">
            <p>Available on most platforms and for most popular programming languages.</p>

            <div class="home-slider-platforms-col">
                <div>
                    <a href=""><img src="/img/home/apple.png" /></a>
                    <a href=""><img src="/img/home/ios.png" /></a>
                    <a href=""><img src="/img/home/windows.png" /></a>
                    <a href=""><img src="/img/home/android.png" /></a>
                </div>
                <div>
                    <a href=""><img src="/img/home/chrome.png" /></a>
                    <a href=""><img src="/img/home/firefox.png" /></a>
                    <a href=""><img src="/img/home/linux.png" /></a>
                    <a href=""><img src="/img/home/bsd.png" /></a>
                </div>
            </div>

            <div class="home-slider-platforms-col right">
                <div>
                    <a href=""><img src="/img/home/archruby.png" /></a>
                    <a href=""><img src="/img/home/objc.png" /></a>
                    <a href=""><img src="/img/home/ruby.png" /></a>
                    <a href=""><img src="/img/home/php.png" /></a>
                </div>
                <div>
                    <a href=""><img src="/img/home/c_sharp.png" /></a>
                    <a href=""><img src="/img/home/nodecasts.png" /></a>
                    <a href=""><img src="/img/home/as.png" /></a>
                    <a href=""><img src="/img/home/nodejs.png" /></a>
                </div>
            </div>
        </div>
    </div>

    <div class="hide home-slider-slide internet-of-things">
        <h2 class="home-slider-title">
            Internet of Things
        </h2>

        <div class="home-slider-description">
            Virgil provides simple, open-source, security layer for<br/>
            all things connected to the Internet.<br/>
            Do you have IoT device or related cloud service?<br/>
        </div>

        <div class="home-slider-or-buttons">
            <a href="/contact-us" class="home-slider-get-started btn-virgil btn-transparent">
                CONTACT US
            </a>
            <span class="or">or</span>
            <a class="home-slider-get-started btn-virgil" href="/dashboard">
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
            Integrate with your business process or work with Virgil-enabled Apps.<br/>
            Breach no longer means data loss. Protect yourself from insider threats.
        </div>

        <div class="home-slider-or-buttons">
            <a href="/contact-us" class="home-slider-get-started btn-virgil btn-transparent">
                CONTACT US
            </a>
            <span class="or">or</span>
            <a class="home-slider-get-started btn-virgil" href="/dashboard">
                GET STARTED
            </a>
        </div>
    </div>

    <div class="hide home-slider-slide without-password">
        <h2 class="home-slider-title">
            Authentication without passwords
        </h2>

        <div class="home-slider-description">
            Your device is your key. Added to any application in minutes.Plugins for major<br/>
            content management systems. Do not see supported platform?
        </div>

        <div class="home-slider-or-buttons">
            <a href="/contact-us" class="home-slider-get-started btn-virgil btn-transparent">
                CONTACT US
            </a>
            <span class="or">or build it yourself in just a few minutes.</span>
        </div>

        <div class="engines">
            <a href=""><img src="/img/home/wordpress.png" /></a>
            <a href=""><img src="/img/home/joomla.png" /></a>
            <a href=""><img src="/img/home/drupal.png" /></a>
            <a href=""><img src="/img/home/phpbb.png" /></a>
            <a href=""><img src="/img/home/vanilla.png" /></a>
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
            database information and protect your clients from unauthorized access.<br/>
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
                <img src="/img/home/iot.png" alt="feature" />
            </div>

            <div class="home-features-feature f2 active hide" data-index="2">
                <img src="/img/home/iot-active.png" alt="feature" />
            </div>

            <div class="home-features-feature f3" data-index="3">
                <img src="/img/home/enterprise.png" alt="feature" />
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
                        <h4>Drop next gen security into every<br/>applicatiotn.</h4>
                        <p>Your clients deserve the best security. Add it without being a security expert yourself.</p>
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
                        <h4>Encrypt data at rest and in transit.</h4>
                        <p>All data should be secure all the time. Users (or Your clients) expect it.</p>
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
