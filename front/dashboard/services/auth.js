angular.module('app.services').factory('auth',
	['$rootScope', 'store',
	function ($rootScope, store) {
		var auth = {
			createSession: function createSession (user) {
				store.set('user', user);
				$rootScope.user = user;
			},

			loadSession: function loadSession () {
				$rootScope.user = store.get('user');
			},

			destroySession: function destroySession () {
				store.remove('user');
				$rootScope.user = null;
			},

			isAuthenticated: function isAuthenticated () {
				return !!auth.getUser();
			},

			getUser: function getUser () {
				return $rootScope.user;
			}
		};

		return auth;
	}
]);
