'use strict';

angular.module('app').
	controller('AppsListCtrl',
	['$scope', 'apps', 'ModalService',
	function($scope, apps, modalService) {
		$scope.app = {};

		fetch();

		$scope.create = create;
		$scope.update = update;
		$scope.remove = remove;

		function create () {
			modalService.showModal({
				templateUrl: 'apps/app-edit.html',
				controller: "AppEditCtrl",
				inputs: {
					app: { name: 'New Application' }
				}
			});
		}

		function update (app) {
			modalService.showModal({
				templateUrl: 'apps/app-edit.html',
				controller: "AppEditCtrl",
				inputs: {
					app: app
				}
			});
		}

		function remove (app) {
			modalService.showModal({
				templateUrl: 'apps/app-remove.html',
				controller: "AppRemoveCtrl",
				inputs: {
					app: app
				}
			});
		}

		function fetch () {
			$scope.apps = apps.query();
		}

	}]);
