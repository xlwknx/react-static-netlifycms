'use strict';

angular.module('app.services', []);
angular.module('app.resources', ['ngResource']);
angular.module('app.templates', []);

angular.module('app', ['ngRoute', 'app.services', 'app.resources', 'app.templates']).
	config(
	['$httpProvider',
	function($httpProvider) {
		$httpProvider.interceptors.push(
			'validationInterceptor',
			'errorInterceptor',
			'progressInterceptor'
		);
	}]);
