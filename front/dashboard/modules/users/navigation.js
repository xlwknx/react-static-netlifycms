'use strict';

angular.module('app').
	controller('NavigationCtrl', ['$scope', '$location', function($scope, $location) {
		// Check if current route is internal page
		$scope.isInternalPage = function isInternalPage () {
			return ['/signup', '/signin', '/reset'].indexOf($location.path()) === -1;
		};

		// Check if given path equals to current route
		$scope.isActive = function (path) {
			return $location.path() == path;
		};
	}]);
