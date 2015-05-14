'use strict';

angular.module('app').
	controller('AppsListCtrl', ['$scope', 'apps',
	function($scope, apps) {
		$scope.app = {};

		fetch();

		$scope.create = create;
		$scope.update = update;
		$scope.remove = remove;

		function create (app) {
			apps.save(app).$promise.then(fetch);
		}

		function update (app) {
			apps.update(app).$promise.then(fetch);
		}

		function remove (app) {
			apps.remove({ id: app.id }).$promise.then(fetch);
		}

		function fetch () {
			$scope.apps = [{}, {}];
			//$scope.apps = apps.query();
		}
	}]);
