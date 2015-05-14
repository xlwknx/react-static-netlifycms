'use strict';

angular.module('app').
	controller('ResetCtrl',
	['$scope', 'accounts', 'auth', '$location',
	function($scope, accounts, auth, $location) {
		$scope.isResetCompleted = false;

		$scope.account = {
			email: ''
		};

		$scope.submit = function submit (account) {
			accounts.reset(account).$promise
				.then(completeReset);

			function completeReset () {
				$scope.isResetCompleted = true;
			}
		};
	}]);
