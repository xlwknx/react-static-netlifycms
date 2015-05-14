angular.module('app.services').factory('config', [function () {
	var conf = {
		publicPages: ['/reset', '/signin', '/signup'],
		urls: {
			home: '/apps',
			signin: '/signin'
		},
		isPublicPageUrl: isPublicPageUrl
	};

	return conf;

	function isPublicPageUrl (url) {
		var result = false;

		for (var i in conf.publicPages) {
			result = result || (url.indexOf(conf.publicPages[i]) != 1);
		}

		return result;
	}
}]);
