@section('title')
    Virgil | Downloads
@show


@section('content')
<div class="page downloads">
    <section class="container downloads-title">
        <h2>Downloads</h2>
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

    <div data-tab="end-users">
        <section class="container downloads-description">
            Our libraries are available across the vast majority of programming languages on<br/>
            a preponderance of platforms (including Android, iOS, Linux, Mac, and Windows).<br/>
            This enables a new generation of enhanced privacy and security for applications,<br/>
            cloud services, and the Internet of Things.
        </section>

        <section class="container downloads-links">
            <a href="" class="downloads-links-link">
                <img src="/img/downloads/wordpress.png" />
                <div>Wordpress</div>
            </a>
            <a href="" class="downloads-links-link">
                <img src="/img/downloads/joomla.png" />
                <div>Joomla</div>
            </a>
            <a href="" class="downloads-links-link">
                <img src="/img/downloads/drupal.png" />
                <div>Drupal</div>
            </a>
            <a href="" class="downloads-links-link">
                <img src="/img/downloads/phpbb.png" />
                <div>phpBB</div>
            </a>
            <a href="" class="downloads-links-link">
                <img src="/img/downloads/vanilla.png" />
                <div>Vanilla</div>
            </a>
        </section>
    </div>

    <div class="container downloads-developers hide" data-tab="developers">
        <div class="row">
            <div class="block downloads-develoeprs-pass">
                <div class="headline">
                    <img src="/img/downloads/pass.png" alt="Virgil Pass" />
                    <h4>Virgil Pass</h4>
                </div>

                <div class="description">
                    Your clients deserve the best security. Add it without being<br/>
                    a security expert yourself. All data should be secure all the<br/>
                    time. Users (or Your clients) expect it.
                </div>

                <ul class="list">
                    <li>Simple-looking search terabytes of data</li>
                    <li>Custom-built cluster management</li>
                    <li>Built on HTML5 using multi-layer concurrency</li>
                </ul>

                <a class="btn-virgil btn-transparent">DOWNLOAD</a>
            </div>

            <div class="block downloads-develoeprs-sync">
                <div class="headline">
                    <img src="/img/downloads/sync.png" alt="Virgil Sync" />
                    <h4>Virgil Sync</h4>
                </div>

                <div class="description">
                    Your clients deserve the best security. Add it without being<br/>
                    a security expert yourself. All data should be secure all the<br/>
                    time. Users (or Your clients) expect it.
                </div>

                <ul class="list">
                    <li>Simple-looking search terabytes of data</li>
                    <li>Custom-built cluster management</li>
                    <li>Built on HTML5 using multi-layer concurrency</li>
                </ul>

                <a class="btn-virgil btn-transparent">DOWNLOAD</a>
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
                    Your clients deserve the best security. Add it without being<br/>
                    a security expert yourself. All data should be secure all the<br/>
                    time. Users (or Your clients) expect it.
                </div>

                <ul class="list">
                    <li>
                        Exploits relationships present in your enterprise<br/>
                        data to provide a guided search
                    </li>
                    <li>Built on HTML5 using multi-layer concurrency</li>
                </ul>

                <a class="btn-virgil btn-transparent">DOWNLOAD</a>
            </div>
            <div class="block downloads-develoeprs-keys">
                <div class="headline">
                    <img src="/img/downloads/keys.png" alt="Virgil Keys" />
                    <h4>Virgil Keys</h4>
                </div>

                <div class="description">
                    Your clients deserve the best security. Add it without being<br/>
                    a security expert yourself. All data should be secure all the<br/>
                    time. Users (or Your clients) expect it.
                </div>

                <ul class="list">
                    <li>
                        Exploits relationships present in your enterprise<br/>
                        data to provide a guided search
                    </li>
                    <li>Built on HTML5 using multi-layer concurrency</li>
                </ul>

                <a class="btn-virgil btn-transparent">DOWNLOAD</a>
            </div>
        </div>
    </div>
</div>
@stop