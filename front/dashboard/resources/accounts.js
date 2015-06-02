angular.module('app.resources').factory('accounts', ['$resource',
	function ($resource) {
		return $resource('/account', null, {});
	}
]);
