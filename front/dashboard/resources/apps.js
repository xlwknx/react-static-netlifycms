angular.module('app.resources').factory('apps', ['$resource',
	function ($resource) {
		return $resource('/api/apps/:id', { id: '@id' }, {
			update: { method: 'PUT' }
		});
	}
]);
