@section('title')
    Virgil | Downloads
@show


@section('content')
<div class="page downloads">
    <section class="container downloads-title">
        <h2>Download Virgil Apps</h2>
    </section>

    <section class="container choices">
            <span class="choices-section end-users tab active" data-tab-show="end-users">
                <span class="label">
                    END USERS
                </span>
            </span>
            <span class="choices-section tab developers" data-tab-show="developers">
                <span class="label">
                    DEVELOPERS
                </span>
            </span>
    </section>

    <div data-tab="developers" class="hide">
        <section class="container downloads-description">
			Virgil Pass Plugins
        </section>

        <section class="container downloads-links">
            <a href="https://github.com/VirgilSecurity/VirgilPlugins/tree/master/wordpress/virgil_pass" target="_blank" class="downloads-links-link">
                <img src="/img/downloads/wordpress.png" />
                <div>Wordpress</div>
            </a>
            <a href="https://github.com/VirgilSecurity/VirgilPlugins/tree/master/joomla" target="_blank" class="downloads-links-link">
                <img src="/img/downloads/joomla.png" />
                <div>Joomla</div>
            </a>
            <a href="https://github.com/VirgilSecurity/VirgilPlugins/tree/master/drupal/mod_virgil_auth" target="_blank" class="downloads-links-link">
                <img src="/img/downloads/drupal.png" />
                <div>Drupal</div>
            </a>
            <a href="https://github.com/VirgilSecurity/VirgilPlugins/tree/master/phpbb/virgil/pass" target="_blank" class="downloads-links-link">
                <img src="/img/downloads/phpbb.png" />
                <div>phpBB</div>
            </a>
            <a href="https://github.com/VirgilSecurity/VirgilPlugins/tree/master/vanillaforum/VirgilPass" target="_blank" class="downloads-links-link">
                <img src="/img/downloads/vanilla.png" />
                <div>Vanilla</div>
            </a>
        </section>
    </div>

    <div class="container downloads-developers" data-tab="end-users">
        <div class="row">
            <div class="block downloads-develoeprs-pass">
                <div class="headline">
                    <img src="/img/downloads/pass.png" alt="Virgil Pass" />
                    <h4>Virgil Pass</h4>
                </div>

                <div class="description">
					Simple, secure passwordless authentication<br/>
					for websites and apps.
                </div>

				<div class="download-label">Downloads <a target="_blank" href="https://chrome.google.com/webstore/detail/virgil-pass/djdkdiphpdjgeoehicikgpgbdhmhdcmp"><img src="/img/home/chrome.png" /></a></div>
            </div>

            <div class="block downloads-develoeprs-sync">
                <div class="headline">
                    <img src="/img/downloads/sync.png" alt="Virgil Sync" />
                    <h4>Virgil Sync</h4>
                </div>

                <div class="description">
					Simple, secure passwordless authentication<br/>
					for websites and apps.
                </div>

				<div class="download-label">Comming soon...</div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="row">
            <div class="block downloads-develoeprs-mail">
                <div class="headline">
                    <img src="/img/downloads/mail.png" alt="Virgil Mail" />
                    <h4>Virgil Mail</h4>
                </div>

                <div class="description">
					Seamless end-to-end encrypted email for Outlook
					clients that uses Virgil Keys.
                </div>

				<div class="download-label">Downloads <a href="https://virgilsecurity.com/downloads/Virgil_Outlook_Add-In_0.4.259.654.exe"><img src="/img/home/windows.png" /></a></div>
            </div>
            <div class="block downloads-develoeprs-keys">
                <div class="headline">
                    <img src="/img/downloads/keys.png" alt="Virgil Keys" />
                    <h4>Virgil Keys</h4>
                </div>

                <div class="description">
					Manage your Virgil Identity keys, as well as<br/>
					apps that use them.
                </div>

				<div class="download-label">Downloads <a href="https://virgilsecurity.com/downloads/Virgil_KeyRing_0.5.240.688.exe"><img src="/img/home/windows.png" /></a></div>
            </div>
        </div>
    </div>
</div>
@stop
