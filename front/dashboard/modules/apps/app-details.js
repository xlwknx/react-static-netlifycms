'use strict';

angular.module('app').
	controller('AppDetailsCtrl',
	['$scope', 'apps', '$routeParams', 'ModalService', '$location',
	function($scope, apps, $routeParams, modalService, $location) {

		fetch();

		$scope.update = update;
		$scope.remove = remove;

		function update (app) {
			modalService.showModal({
				templateUrl: 'apps/app-edit.html',
				controller: "AppEditCtrl",
				inputs: {
					app: $scope.app
				}
			});
		}

		function remove (app) {
			modalService.showModal({
				templateUrl: 'apps/app-remove.html',
				controller: "AppRemoveCtrl",
				inputs: {
					app: $scope.app
				}
			}).then(function (modal) {
				modal.close.then(function (isRemoved) {
					if (isRemoved) {
						$location.path('/apps');
					}
				});
			});
		}

		function fetch () {
			$scope.app = apps.get({ id: $routeParams.id });
		}
	}]);
