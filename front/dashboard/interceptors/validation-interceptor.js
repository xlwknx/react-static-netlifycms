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
	// Account

	30001: { email: 'Account was not found' },
	30002: { email: 'Account already exists' },
	30003: { email: 'Account email was not provided' },
	30004: { email: 'Account password was not provided' },
	30005: { email: 'Account type was not provided' },
	30006: { email: 'Account tpe was not found' },

	// Applications

	50001: { name        : '' }, //'Application name was not provided' },
	50002: { description : '' }, //'Application description was not provided' },
	50003: { url         : '' }, //'Application url was not provided' },
	50004: { name        : '' }, //'Application was not found' },
	50005: { name        : '' }, //'Application limit was exceeded' },
	50006: { key         : '' }, //'Application key was not found' },
	50007: { name        : '' }, //'Application service was not recognized' },
	50008: { name        : '' }, //'Application call limit was exceeded' }
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
