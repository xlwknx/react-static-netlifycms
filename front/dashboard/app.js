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
	['auth',
	function(auth) {
		auth.loadSession();
		//auth.injectIntoScope();

		//// Don't show login page for logged in users
		//$rootScope.$on('$locationChangeStart', function (ev, next) {
			//if (auth.isAuthenticated() && ((next.indexOf(config.urls.register) !== -1 || next.indexOf(config.urls.login) !== -1))) {
				//$location.path(config.urls.home);
			//}
		//});
	}]);
