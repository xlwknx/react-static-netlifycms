var gulp = require('gulp');
var stylus = require('gulp-stylus');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var plumber = require('gulp-plumber');
var template_cache = require('gulp-angular-templatecache');
var run_sequence = require('run-sequence');

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

gulp.task('styles', function() {
	return gulp.src(config.styles.src)
		.pipe(stylus({'include css': true}))
		.pipe(concat(config.styles.dist))
		.pipe(gulp.dest(config.styles.dest));
});

gulp.task('templates', function() {
	return gulp.src(config.templates.src)
		.pipe(template_cache({ module: 'app.templates' }))
		.pipe(gulp.dest(config.templates.dest));
});

gulp.task('js', function() {
	return gulp.src(config.js.src)
		.pipe(concat(config.js.dist))
		.pipe(gulp.dest(config.js.dest));
});

gulp.task('build', function() {
	return run_sequence(['templates', 'styles'], ['js']);
});

gulp.task('watch', ['build'], function() {
	return gulp.watch(['./front/dashboard/**/*.*'], ['build']);
});

gulp.task('default', ['watch']);
