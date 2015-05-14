'use strict';

angular.module('app.services', []);
angular.module('app.resources', ['ngResource']);
angular.module('app.templates', []);

angular.module('app', ['ngRoute', 'app.services', 'app.resources', 'app.templates', 'angular-storage']).
	config(
	['$httpProvider',
	function($httpProvider) {
		$httpProvider.interceptors.push(
			'validationInterceptor',
			'errorInterceptor',
			'progressInterceptor'
		);
	}])

	.run(
	['auth', '$rootScope', 'config', '$location',
	function(auth, $rootScope, config, $location) {
		auth.loadSession();

		// Prevent logged in user from signin, signup, reset password pages
		$rootScope.$on('$locationChangeStart', function (ev, next) {
			if (auth.isAuthenticated() && config.isPublicPageUrl(next)) {
				$location.path(config.urls.home);
			}
		});
	}]);
