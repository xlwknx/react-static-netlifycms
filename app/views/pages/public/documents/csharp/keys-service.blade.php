@section('title')
Virgil | Developers | C#/.NET | Keys Service
@show

@section('content')
<div class="dev">
	<div class="dev-header">
		<div class="container">
			<div class="dev-header-title">
			    <h1>Getting Started with C#/.NET</h1>
    			<h3>This documentation will help you get started developing secure applications.</h3>
			</div>
		</div>
		<nav class="navbar navbar-default dev-navbar hidden-xs">
			<div class="container">
	    		<div class="collapse navbar-collapse">
	     			<ul class="nav navbar-nav">
	        			<li><a href="/documents/csharp/quickstart">Quickstart</a></li>
	        			<li><a href="/documents/csharp/crypto-lib" >Crypto Library</a></li>
	        			<li><a href="/documents/csharp/sdk">SDK</a></li>
	        			<li class="active" ><a href="/documents/csharp/keys-service" >Keys Service</a></li>
	        			<li><a href="/documents/csharp/downloads" >Downloads</a></li>
	        		</ul>
	        	</div>
	        </div>
    	</nav>
    	<div class="dev-navbar-sm visible-xs">
	    	<div class="container">
		    	<div class="list-group">
					<a href="/documents/csharp/quickstart" class="list-group-item">Quickstart</a>
					<a href="/documents/csharp/crypto-lib" class="list-group-item">Crypto Library</a>
					<a href="/documents/csharp/sdk" class="list-group-item">SDK</a>
					<a href="/documents/csharp/keys-service" class="list-group-item active">Keys Service</a>
					<a href="/documents/csharp/downloads" class="list-group-item">Downloads</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-38 dev-content">
				<h2>Public Keys Management</h2>
				<p>PKI service is responsible for management of user's identities (like email, mobile, etc.) and corresponding public keys.</p>
				<ul>
					<li>Account - represents the service customer. Top-level entity that aggregates all user's public keys. </li>
					<li>Public Key - holds public key information for user's account and aggregates user identities related to this public key.</li>
					<li>UserData - validated user information pieces that use public key to encrypt the data.</li>
				</ul>
				<h2>Public Keys</h2>
			</div>
			<div class="col-md-10">
				<ul class="nav nav-pills nav-stacked dev-affix">
		            <li class="title" role="presentation">Public Keys Management</li>
		            <li role="presentation"><a href="#obtaining-an-app-token">Obtaining an App Token</a></li>
		            <li role="presentation"><a href="#install">Install</a></li>
		            <li role="presentation"><a href="#generate-keys">Generate Keys</a></li>
		            <li role="presentation"><a href="#register-user">Register User</a></li>
		            <li class="title" role="presentation">Private Keys Management</li>
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
