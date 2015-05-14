angular.module('app.services').factory('progressInterceptor',
   ['$q', function ($q) {
		var progressElement = $('.progress-indicator');
		var depth = 0;

		return {
			request: onRequest,
			response: onResponse,
			responseError: onResponseError
		};

		function onRequest (config) {
			depth++;
			progressElement.removeClass('hide');
			return config;
		}

		function onResponse (response) {
			if (--depth === 0) {
				progressElement.addClass('hide');
			}

			return response || $q.when(response);
		}

		function onResponseError (rejection) {
			if (--depth === 0) {
				progressElement.addClass('hide');
			}

			return $q.reject(rejection);
		}
	}
]);
