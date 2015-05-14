angular.module('app.services').factory('config', [function () {
	return {
		publicPages: ['/reset', '/signin', '/signup'],
		urls: {
			signin: '/signin'
		}
	};
}]);
