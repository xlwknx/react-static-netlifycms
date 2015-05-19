@section('header')
<header class="header container">
    <div class="header-block">
        <a href="/">
            <img src="img/logo.png" class="header-logo" alt="Virgil" />
        </a>
    </div>

    <nav class="header-nav header-block header-nav-left">
        <a href="/contact-us" class="header-nav-link">CONTACT US</a>
    </nav>

    <nav class="header-nav header-block header-nav-right">
        <a href="/downloads" class="header-nav-link">DOWNLOADS</a>
        <a href="/documents" class="header-nav-link">DOCUMENTATION</a>

        @if (!is_null($auth_token))
        <a href="/signin" class="header-nav-link">DASHBOARD</a>
        @else
        <a href="/signin" class="header-nav-link">SIGN IN</a>
        @endif
		<a href="https://www.facebook.com/VirgilSec" target="_blank" class="header-nav-link social facebook">
			<img src="/img/social-facebook.png" alt="facebook" />
		</a>
		<a href="https://twitter.com/VirgilSecurity" target="_blank" class="header-nav-link social">
			<img src="/img/social-twitter.png" alt="twitter" />
		</a>
    </nav>
</header>
@section('stop')
