angular.module('app.services').factory('validationInterceptor', ['$q', '$document',
	function ($q, $document) {
		return {
			response: function (response) {
				if (response.status === 200) {
					clearErrors($document);
				}

				return response || $q.when(response);
			},

			responseError: function (rejection) {
				if (_.isObject(rejection.data) && rejection.data.errors) {
					showErrors($document, rejection.data.errors);
				}

				return $q.reject(rejection);
			}
		};
	}
]);

function showErrors (root, errors) {
	clearErrors(root);

	for (var field in errors) {
		var input = root.find('[name="' + field + '"]:not([data-ignore])');
		var wrapper = input.parents('.form-input');

		wrapper.addClass('has-error');

		if (!wrapper.hasClass('no-err-msg')) {
			wrapper.append(renderError(field, errors[field]));
		}
	}
}

function clearErrors (root) {
	root.find('span.error').remove();
	root.find('.form-input.has-error').removeClass('has-error');
}

function renderError (field, message) {
	return '<span class="error text-danger">' + message + '</span>';
}
