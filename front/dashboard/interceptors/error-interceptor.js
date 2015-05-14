angular.module('app.services').factory('errorInterceptor',
   ['$rootScope', '$timeout', '$q', '$location', 'config', 'auth',
	function ($rootScope, $timeout, $q, $location, config, auth) {
		return {
			response: function (response) {
				if (response.status === 200) {
					$rootScope.hasError = false;
				}

				return response || $q.when(response);
			},

			responseError: function (rejection) {
				if (rejection.status === 401) {
					auth.destroySession();
					$location.path(config.urls.signin);
				} else if (!(_.isObject(rejection.data) && rejection.data.error)) {
					$rootScope.hasError = true;
					$timeout(function () {
						$rootScope.hasError = false;
					}, 3000);
				}

				return $q.reject(rejection);
			}
		};
	}
]);
