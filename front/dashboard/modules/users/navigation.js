'use strict';

angular.module('app').
	controller('NavigationCtrl',
	['$scope', '$location', 'accounts', 'auth', 'config',
	function($scope, $location, accounts, auth, config) {

		// Check if current route is internal page
		$scope.isInternalPageAllowed = function isInternalPageAllowed () {
			return true; // FIXME
			return auth.isAuthenticated() && ['/signup', '/signin', '/reset'].indexOf($location.path()) === -1;
		};

		// Check if given path equals to current route
		$scope.isActive = function isActive (path) {
			return $location.path() == path;
		};

		$scope.signout = function signout () {
			accounts.signout(auth.getUser()).$promise
				.then(finalizeSignout);

			function finalizeSignout () {
				auth.destroySession();
				$location.path(config.urls.signin);
			}
		}

	}]);
