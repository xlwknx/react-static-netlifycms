angular.module('app.resources').factory('accounts', ['$resource',
	function ($resource) {
		return $resource('/account', null, {
			signin: { method: 'POST', url: '/account/signin' },
			signup: { method: 'POST', url: '/account/signup' },
			signout: { method: 'POST', url: '/account/signout' },
			resend: { method: 'POST', url: '/account/re-send' }
		});
	}
]);
