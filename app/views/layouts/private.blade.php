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
        <header class="header" ng-if="isInternalPage()">
            <a class="block" ng-href="/apps">
                <img src="/img/logo.png" class="logo" alt="Virgil" />
            </a>

            <a ng-click="signout()" class="block signout">
                Sign Out
            </a>
        </header>

        <ul class="sidebar" ng-if="isInternalPage()">
            <li ng-class="{ active: isActive('/apps') }">
                <a ng-href="/apps">Apps</a>
            </li>
        </ul>

        <div class="content" ng-class="{ internal: isInternalPage() }" ng-view></div>

        <script src='/dist/app.js'></script>
    </body>
</html>
