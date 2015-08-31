@section('title')
    Virgil | Apps
@show


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" >
            <h2>PAGE IS UNDERCONSTRUCTION</h2>
        </div>        
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="media">
              <div class="media-left media-top">
                <a href="#">
                  <img class="media-object" src="..." alt="...">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">Virgil Pass</h4>
                <p><b>Simple, secure passwordless authentication for websites and applications.</b></p>
                The Virgil Pass extension provides passwordless authentication for any site that supports Virgil Pass.
                Virgil Pass is a next-generation authentication, encryption, and verification system based on the Elliptic 
                Curve Integrated Encryption Scheme (ECIES). Virgil Pass combines standards-based cryptography with an open, 
                global key management system to make state-of-the-art privacy and security available to any application developer.
              </div>
            </div>            
        </div>
        <div class="col-md-6">
            <div class="media-left media-top">
                <a href="#">
                  <img class="media-object" src="..." alt="...">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">Virgil Sync</h4>
                <p><b>Simple, end-to-end encrypted file sync for your documents, photos, videos and files.</b></p>
                Virgil Security, Inc., provides easy-to-deploy and easy-to-use cryptographic software and services for use by 
                developers and end-users. Virgil Security’s encryption libraries and services, along with an accompanying public 
                key management infrastructure, ease the pain of developing, deploying, and using strong cryptography. Virgil 
                Security enables a new generation of enhanced privacy and security for applications.
              </div>
            </div>    
        </div>
    </div>

</div>        
    
    <!--<div class="page downloads">
        <section class="container downloads-title">
            <h2>Download Virgil Apps</h2>
        </section>

        <section class="container choices">
            <div class="row">
                <div class="col-xs-21 col-xs-offset-1">
                    <span class="choices-section tab end-users active" data-tab-show="end-users">
                        <span class="label">END USERS</span>
                    </span>
                </div>
                <div class="col-xs-21 col-xs-offset-1">
                    <span class="choices-section tab developers" data-tab-show="developers">
                        <span class="label">DEVELOPERS</span>
                    </span>
                </div>
            </div>
        </section>

        <div data-tab="developers" class="hide">
            <section class="container downloads-description">
                Virgil Pass Plugins
            </section>

            <section class="container downloads-links">
                <div class="row">
                    <div class="col-sm-10 col-xs-24">
                        <a href="https://github.com/VirgilSecurity/VirgilPlugins/tree/master/wordpress/virgil_pass" target="_blank"
                           class="downloads-links-link">
                            <img src="/img/downloads/wordpress.png"/>

                            <div>Wordpress</div>
                        </a>
                    </div>
                    <div class="col-sm-10 col-xs-24">
                        <a href="https://github.com/VirgilSecurity/VirgilPlugins/tree/master/joomla" target="_blank" class="downloads-links-link">
                            <img src="/img/downloads/joomla.png"/>

                            <div>Joomla</div>
                        </a>
                    </div>
                    <div class="col-sm-10 col-xs-24">
                        <a href="https://github.com/VirgilSecurity/VirgilPlugins/tree/master/drupal/mod_virgil_auth" target="_blank"
                           class="downloads-links-link">
                            <img src="/img/downloads/drupal.png"/>

                            <div>Drupal</div>
                        </a>
                    </div>
                    <div class="col-sm-10 col-xs-24">
                        <a href="https://github.com/VirgilSecurity/VirgilPlugins/tree/master/phpbb/virgil/pass" target="_blank" class="downloads-links-link">
                            <img src="/img/downloads/phpbb.png"/>

                            <div>phpBB</div>
                        </a>
                    </div>
                    <div class="col-sm-10 col-xs-48">
                        <a href="https://github.com/VirgilSecurity/VirgilPlugins/tree/master/vanillaforum/VirgilPass" target="_blank"
                           class="downloads-links-link">
                            <img src="/img/downloads/vanilla.png"/>

                            <div>Vanilla</div>
                        </a>
                    </div>
                </div>
            </section>
        </div>

        <div class="container downloads-developers" data-tab="end-users">

            <div class="row">
                <div class="col-xs-44 col-xs-offset-2 col-sm-48 col-sm-offset-0">
                    <div class="row">
                        <div class="col-md-23 downloads-develoeprs-pass block">
                            <div class="headline">
                                <img src="/img/downloads/pass.png" alt="Virgil Pass"/>
                                <h4>Virgil Pass</h4>
                            </div>

                            <div class="description">
                                Simple, secure passwordless authentication<br/>
                                for websites and apps.
                            </div>

                            <div class="download-label">
                                Downloads <a target="_blank" href="https://chrome.google.com/webstore/detail/virgil-pass/djdkdiphpdjgeoehicikgpgbdhmhdcmp">
                                    <img src="/img/home/chrome.png"/>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-23 col-md-offset-2 downloads-develoeprs-sync block">
                            <div class="headline">
                                <img src="/img/downloads/sync.png" alt="Virgil Sync"/>
                                <h4>Virgil Sync</h4>
                            </div>

                            <div class="description">
                                Simple, end-to-end encrypted file sync for your documents,<br/>
                                photos, videos and files.
                            </div>

                            <div class="download-label">Coming soon...</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-44 col-xs-offset-2 col-sm-48 col-sm-offset-0">
                    <div class="row">
                        <div class="col-md-23 downloads-develoeprs-mail block">
                            <div class="headline">
                                <img src="/img/downloads/mail.png" alt="Virgil Mail"/>
                                <h4>Virgil Mail</h4>
                            </div>

                            <div class="description">
                                Seamless end-to-end encrypted email for Outlook
                                clients that uses Virgil Keys.
                            </div>

                            <div class="download-label">
                                Downloads <a href="https://virgilsecurity.com/download/Virgil_Outlook_Add-In_0.4.259.654.exe">
                                    <img src="/img/home/windows.png"/>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-23 col-md-offset-2 downloads-develoeprs-keys block">
                            <div class="headline">
                                <img src="/img/downloads/keys.png" alt="Virgil Keys"/>
                                <h4>Virgil Keys</h4>
                            </div>

                            <div class="description">
                                Manage your Virgil Identity keys, as well as<br/>
                                apps that use them.
                            </div>

                            <div class="download-label">
                                Downloads <a href="https://virgilsecurity.com/download/Virgil_KeyRing_0.5.240.688.exe">
                                    <img src="/img/home/windows.png"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>-->
@stop
