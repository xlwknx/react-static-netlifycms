angular.module('app.services').factory('authInterceptor',
	['$q', '$location', 'auth', 
	function ($q, $location, auth) {
		return {
			request: function (config) {
				config.headers = config.headers || {};

				if (auth.isAuthenticated() && !(config.url.indexOf('http') == 0)) {
					config.headers['x-auth-token'] = auth.getAuthToken();
				}

				return config;
			}
		};
	}
]);
