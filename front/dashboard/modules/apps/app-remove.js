'use strict';

angular.module('app').
	controller('AppRemoveCtrl', ['$scope', 'close', 'app', 'apps',
	function($scope, closeModal, app, apps) {
		$scope.app = app;

		$scope.close = function close () {
			closeModal(false);
		};

		$scope.remove = function remove () {
			apps.delete({ id: app.id }).$promise.then(function () {
				closeModal(true);
			});
		};
	}]);
