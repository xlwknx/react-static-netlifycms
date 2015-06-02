<!doctype html>
    <html lang="en" ng-app="app">
    <head>
        <base href="/">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Virgil App</title>
        <link href="/dist/app.css" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    </head>
    <body ng-controller="NavigationCtrl">
		<div class="initial-hide internal" ng-class="{ hide: !isInternalPageAllowed() }">
			<header class="header">
				<a class="block" ng-href="/dashboard">
					<img src="/img/logo.png" class="logo" alt="Virgil" />
				</a>

				<a target="_self" href="/account/signout" class="block signout">
					Sign Out
				</a>
			</header>

			<ul class="sidebar">
				<li ng-class="{ active: isActive('/dashboard') }">
					<a ng-href="/dashboard">Apps</a>
				</li>
			</ul>
		</div>

        <div class="content" ng-class="{ internal: isInternalPageAllowed() }" ng-view></div>

        <script src='/dist/app.js'></script>
    </body>
</html>
