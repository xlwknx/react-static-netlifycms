@section('footer')
    <div class="row">
        <div class="hidden-xs col-md-38">
            <div class="footer-copy">
                &copy; Virgil Security, Inc. <?= date('Y'); ?>
            </div>

            <div class="footer-links">
                <a href="/contact-us" class="header-nav-link">CONTACT US</a>
                <a href="/downloads">APPS</a>
                <a href="/documents">DEVELOPERS</a>
            </div>
        </div>
        <div class="visible-xs col-xs-44 col-xs-offset-2">
            <div class="row">
                <div class="row col-xs-48 footer-copy">
                    &copy; Virgil Security, Inc. <?= date('Y'); ?>
                </div>
                <div class="row col-xs-48 footer-links">
                    <a href="/contact-us" class="header-nav-link">CONTACT US</a>
                    <a href="/downloads">APPS</a>
                    <a href="/documents">DEVELOPERS</a>
                </div>
            </div>
        </div>

        <div class="hidden-xs col-md-10">
            <div class="footer-social">
                <a href="https://twitter.com/VirgilSecurity" target="_blank">
                    <img src="/img/social-twitter.png" alt="twitter"/>
                </a>
                <a href="https://www.facebook.com/VirgilSec" target="_blank">
                    <img src="/img/social-facebook.png" alt="facebook"/>
                </a>
                <a href="https://www.linkedin.com/company/virgil-security-inc-" target="_blank">
                    <img src="/img/social-linkedin.png" alt="twitter"/>
                </a>
            </div>
        </div>
        <div class="visible-xs col-xs-44 col-xs-offset-2 footer-social">
            <a href="https://twitter.com/VirgilSecurity" target="_blank">
                <img src="/img/social-twitter.png" alt="twitter"/>
            </a>
            <a href="https://www.facebook.com/VirgilSec" target="_blank">
                <img src="/img/social-facebook.png" alt="facebook"/>
            </a>
            <a href="https://www.linkedin.com/company/virgil-security-inc-" target="_blank">
                <img src="/img/social-linkedin.png" alt="twitter"/>
            </a>
        </div>
    </div>
@show
