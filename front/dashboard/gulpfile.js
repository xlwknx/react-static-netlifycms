var helpers = require('../../gulp-helpers');
var run_sequence = require('run-sequence');
var gulp = helpers.gulp;

function p (relative) {
	return __dirname + '/' + relative;
}

var config = {
	styles: {
		src: [
			p('.//styles/main.less')
		],

		dist: 'app.css',
		dest: p('../../public/dist')
	},

	templates: {
		src: [p('./modules/**/*.html'), p('./directives/**/*.html')],
		dest: p('./.template-cache')
	},

	js: {
		src: [
			p('../../bower_components/lodash/dist/lodash.min.js'),
			p('../../bower_components/jquery/dist/jquery.js'),
			p('../../bower_components/angular/angular.js'),

			p('../../bower_components/angular-route/angular-route.js'),
			p('../../bower_components/angular-resource/angular-resource.js'),
			p('../../bower_components/a0-angular-storage/dist/angular-storage.js'),
			p('../../bower_components/angular-modal-service/dst/angular-modal-service.js'),

			p('./app.js'),
			p('./routes.js'),
			p('./directives/**/*.js'),
			p('./modules/**/*.js'),
			p('./services/**/*.js'),
			p('./filters/**/*.js'),
			p('./interceptors/**/*.js'),
			p('./resources/**/*.js'),
			p('./.template-cache/*.js')
		],

		dist: 'app.js',
		dest: p('../../public/dist')
	}
};

gulp.task('dashboard-styles',    helpers.styles(config.styles.src, config.styles.dist, config.styles.dest));
gulp.task('dashboard-templates', helpers.templates(config.templates.src, config.templates.dest));
gulp.task('dashboard-js',        helpers.js(config.js.src, config.js.dist, config.js.dest));

gulp.task('dashboard-build', function buildDashboard () {
	return run_sequence(['dashboard-templates', 'dashboard-styles'], ['dashboard-js']);
});

gulp.task('dashboard-watch', ['dashboard-build'], function() {
	return gulp.watch([p('./**/*.*')], ['dashboard-build']);
});
