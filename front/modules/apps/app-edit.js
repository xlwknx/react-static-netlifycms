'use strict';

angular.module('app').
	controller('AppEditCtrl', ['$scope', '$routeParams', '$location', 'apps',
	function($scope, $routeParams, $location, apps) {
		var isNew = $routeParams.id === 'new';

		if (isNew) {
			$scope.app = {};
		} else {
			$scope.app = apps.get($routeParams);
		}

		$scope.update = update;

		function update () {
			if (isNew) {
				apps.save($scope.app).$promise.then(redirectToEdit);
			} else {
				apps.update($scope.app);
			}
		}

		function redirectToEdit (app) {
			$location.path('/apps/' + app.id);
		}
	}]);
