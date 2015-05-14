angular.module('app.services').factory('config', [function () {
	return {
		urls: {
			home: '/',
			login: '/login',
			register: '/register'
		}
	};
}]);
