angular.module('app')
	.directive('publicHeader', ['$injector', function($injector) {
		return {
			restrict: 'E',

			templateUrl: 'public-header/public-header.html',

			scope: {

			},

			link: function($scope, $el, $attrs) {

			}
		};
	}]);
