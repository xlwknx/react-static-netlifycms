angular.module('app.resources').factory('apps', ['$resource',
	function ($resource) {
		return $resource('/application/:id', { id: '@id' }, {
			query: { method: 'get', url: '/application/list', isArray: true },
			get:   { method: 'get', url: '/application/get/:id' },
			update: { method: 'PUT' }
		});
	}
]);
