'use strict';

angular.module('app').
	controller('SigninCtrl',
	['$scope', 'accounts', 'auth', '$location', 'config',
	function($scope, accounts, auth, $location, config) {
		$scope.account = {
			email: '',
			password: ''
		};

		$scope.submit = function submit (account) {
			accounts.signin(account).$promise
				.then(createSession);

			function createSession (result) {
				if (result.auth_token) {
					var user = { auth_token: result.auth_token };
					auth.createSession(user);
					$location.path(config.urls.home);
				}
			}
		};
	}]);
