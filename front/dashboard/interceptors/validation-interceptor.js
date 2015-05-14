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
				if (_.isObject(rejection.data) && rejection.data.error) {
					showErrors($document, prepareErrors(rejection.data.error));
				}

				return $q.reject(rejection);
			}
		};
	}
]);


var errorsMap = {
	30001: { email: 'Account was not found' },
	30002: { email: 'Account already exists' },
	30003: { email: 'Account email was not provided' },
	30004: { email: 'Account password was not provided' },
	30005: { email: 'Account type was not provided' },
	30006: { email: 'Account tpe was not found' },
};

// Adapter for code-based errors
function prepareErrors (error) {
	return errorsMap[error.code];
}

function showErrors (root, errors) {
	clearErrors(root);

	for (var field in errors) {
		var input = root.find('[name="' + field + '"]:not([data-ignore])');
		var wrapper = input.parents('.form-item');

		wrapper.addClass('error');

		if (!wrapper.hasClass('no-err-msg')) {
			wrapper.append(renderError(field, errors[field]));
		}
	}
}

function clearErrors (root) {
	root.find('.error-label').remove();
	root.find('.form-item.error').removeClass('error');
}

function renderError (field, message) {
	return '<div class="error-label">' + message + '</div>';
}
