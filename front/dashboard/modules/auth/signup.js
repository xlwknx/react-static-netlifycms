'use strict';

angular.module('app').
	controller('SignupCtrl',
	['$scope', 'accounts', 'auth', '$location',
	function($scope, accounts, auth, $location) {
		$scope.isSignupCompleted = false;

		$scope.account = {
			email: '',
			password: '',
			company_name: ''
		};

		$scope.submit = function submit (account) {
			accounts.signup(account).$promise
				.then(completeSignup);

			function completeSignup () {
				$scope.isSignupCompleted = true;
			}
		};
	}]);
