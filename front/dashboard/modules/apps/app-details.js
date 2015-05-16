'use strict';

angular.module('app').
	controller('AppDetailsCtrl', ['$scope', 'apps', '$routeParams',
	function($scope, apps, $routeParams) {
		$scope.app = apps.get({ id: $routeParams.id });
	}]);
