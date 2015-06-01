angular.module('app.services').factory('config', [function () {
	var conf = {
		publicPages: ['/reset', '/signin', '/signup'],
		urls: {
			home: '/dashboard',
			signin: '/signin'
		},
		isPublicPageUrl: isPublicPageUrl
	};

	return conf;

	function isPublicPageUrl (url) {
		return false; // FIXME since SPA only serves internal app it will always be false
		var result = false;

		for (var i in conf.publicPages) {
			result = result || (url.indexOf(conf.publicPages[i]) != -1);
		}

		return result;
	}
}]);
