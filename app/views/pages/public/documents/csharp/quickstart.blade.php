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
            		Crypto Library and <a href="/documents/keys-service">Keys Service</a> for most popular platforms and languages.
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
        		<p>Simply add your app token to HTTP header to each request <code>x-virgil-app-token: {YOUR_APP_TOKEN}</code></p>
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

			</div>
			<div class="col-md-10">
				<ul class="nav nav-pills nav-stacked dev-affix">
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
