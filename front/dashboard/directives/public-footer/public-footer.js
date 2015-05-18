angular.module('app')
	.directive('publicFooter', ['$injector', function($injector) {
		return {
			restrict: 'E',

			templateUrl: 'public-footer/public-footer.html',

			scope: {

			},

			link: function($scope, $el, $attrs) {

			}
		};
	}]);
