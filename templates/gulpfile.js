var gulp = require('gulp');
var stylus = require('gulp-stylus');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var template_cache = require('gulp-angular-templatecache');
var run_sequence = require('run-sequence');

var config = {
	styles: {
		src: [
			'./styles/home.styl'
		],

		dist: 'app.css',
		dest: './dist'
	},

	js: {
		src: [ ],
		dist: 'app.js',
		dest: './dist'
	}
};

gulp.task('styles', function() {
	return gulp.src(config.styles.src)
		.pipe(stylus())
		.pipe(concat(config.styles.dist))
		.pipe(gulp.dest(config.styles.dest));
});

gulp.task('js', function() {
	return gulp.src(config.js.src)
		.pipe(concat(config.js.dist))
		.pipe(gulp.dest(config.js.dest));
});

gulp.task('build', function() {
	return run_sequence(['styles'], ['js']);
});

gulp.task('watch', ['build'], function() {
	return gulp.watch(['./styles/**/*.*'], ['build']);
});

gulp.task('default', ['watch']);
