var helpers = require('../../gulp-helpers');
var gulp = helpers.gulp;

var config = {
	styles: {
		src: [
			'./front/dashboard/styles/main.styl'
		],

		dist: 'app.css',
		dest: './public/dist'
	},

	templates: {
		src: ['./front/dashboard/modules/**/*.html', './front/dashboard/directives/**/*.html'],
		dest: './front/dashboard/.template-cache'
	},

	js: {
		src: [
			'./bower_components/lodash/dist/lodash.min.js',
			'./bower_components/jquery/dist/jquery.js',
			'./bower_components/angular/angular.js',

			'./bower_components/angular-route/angular-route.js',
			'./bower_components/angular-resource/angular-resource.js',
			'./bower_components/a0-angular-storage/dist/angular-storage.js',
			'./bower_components/angular-modal-service/dst/angular-modal-service.js',

			'./front/dashboard/app.js',
			'./front/dashboard/routes.js',
			'./front/dashboard/directives/**/*.js',
			'./front/dashboard/modules/**/*.js',
			'./front/dashboard/services/**/*.js',
			'./front/dashboard/filters/**/*.js',
			'./front/dashboard/interceptors/**/*.js',
			'./front/dashboard/resources/**/*.js',
			'./front/dashboard/.template-cache/*.js'
		],

		dist: 'app.js',
		dest: './public/dist'
	}
};

gulp.task('dashboard-styles',    helpers.styles(config.styles.src, config.styles.dist, config.styles.dest));
gulp.task('dashboard-templates', helpers.templates(config.templates.src, config.templates.dest));
gulp.task('dashboard-js',        helpers.js(config.js.src, config.js.dist, config.js.dest));

gulp.task('dashboard-build', function buildDashboard () {
	return run_sequence(['dashboard-templates', 'dashboard-styles'], ['dashboard-js']);
});

gulp.task('dashboard-watch', ['dashboard-build'], function() {
	return gulp.watch(['./front/dashboard/**/*.*'], ['dashboard-build']);
});
