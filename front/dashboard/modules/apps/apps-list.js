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
			}).then(fetchOnModalClose);
		}

		function update (app) {
			modalService.showModal({
				templateUrl: 'apps/app-edit.html',
				controller: "AppEditCtrl",
				inputs: {
					app: app
				}
			}).then(fetchOnModalClose);
		}

		function remove (app) {
			modalService.showModal({
				templateUrl: 'apps/app-remove.html',
				controller: "AppRemoveCtrl",
				inputs: {
					app: app
				}
			}).then(fetchOnModalClose);
		}

		function fetchOnModalClose (modal) {
			modal.close.then(function (isChanged) {
				if (isChanged) {
					fetch();
				}
			});
		}

		function fetch () {
			$scope.apps = apps.query();
		}

	}]);
