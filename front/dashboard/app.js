'use strict';

angular.module('app.services', []);
angular.module('app.resources', ['ngResource']);
angular.module('app.templates', []);

angular.module('app', ['ngRoute', 'app.services', 'app.resources', 'app.templates', 'angular-storage', 'angularModalService']).
	config(
	['$httpProvider',
	function($httpProvider) {
		$httpProvider.interceptors.push(
			//'authInterceptor', FIXME remove if don't need token headers any more
			'validationInterceptor',
			'errorInterceptor',
			'progressInterceptor'
		);
	}])

	.run(
	['auth', '$rootScope', 'config', '$location',
	function(auth, $rootScope, config, $location) {
		auth.loadSession();
		$('.initial-hide').removeClass('initial-hide');

		// Prevent logged in user from signin, signup, reset password pages
		$rootScope.$on('$locationChangeStart', function (ev, next) {
			var isPublic = config.isPublicPageUrl(next); // FIXME remove in future
			var isAuthenticated = auth.isAuthenticated(); // FIXME remove since SPA serves only internal pages and always got auth

			if (isAuthenticated && isPublic) {
				$location.path(config.urls.home);
				return $location.replace();
			}

			if (!isAuthenticated && !isPublic) {
				$location.path(config.urls.signin);
				return $location.replace();
			}
		});
	}]);
