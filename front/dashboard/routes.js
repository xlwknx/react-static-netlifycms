angular.module('app').config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider) {	$routeProvider.
		when('/apps/:id', { templateUrl: 'apps/app-details.html', controller: 'AppDetailsCtrl', reloadOnSearch: false }).
		when('/dashboard', { templateUrl: 'apps/apps-list.html', controller: 'AppsListCtrl', reloadOnSearch: false }).

		when('/signin', { templateUrl: 'auth/signin.html', controller: 'SigninCtrl', reloadOnSearch: false }).
		when('/signup', { templateUrl: 'auth/signup.html', controller: 'SignupCtrl', reloadOnSearch: false }).
		when('/reset', { templateUrl: 'auth/reset.html', controller: 'ResetCtrl', reloadOnSearch: false }).

		otherwise({ redirectTo: '/dashboard' });

		$locationProvider.html5Mode(true);
}]);
