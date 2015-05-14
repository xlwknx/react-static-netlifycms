'use strict';

angular.module('app').
	controller('SigninCtrl',
	['$scope', 'accounts', 'auth', '$location',
	function($scope, accounts, auth, $location) {
		$scope.account = {
			email: '',
			password: ''
		};

		$scope.submit = function submit (account) {
			accounts.signin(account).$promise
				.then(createSession)
				.catch(handleError);

			function createSession (result) {
				if (result.auth_token) {
					var user = { auth_token: result.auth_token };
					auth.createSession(user);
					$location.path('/apps');
				}
			}

			function handleError (result) {
				if (result.data && result.data.error && result.data.error.code) {

				}
			}
		};
	}]);


