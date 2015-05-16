'use strict';

angular.module('app').
	controller('AppRemoveCtrl', ['$scope', 'close', 'app', 'apps',
	function($scope, closeModal, app, apps) {
		$scope.app = app;

		$scope.close = function close () {
			closeModal();
		};

		$scope.save = function save () {
			var promise;

			if (app.id) {
				promise = apps.update(app).$promise;
			} else {
				promise = apps.save(app).$promise;
			}

			promise.then(function () {
				closeModal();
			});
		};
	}]);
